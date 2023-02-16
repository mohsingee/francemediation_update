<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Training_submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        if ($request->ajax()) {
            $data = Training_submissions::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('check', function($row1){
                    $btn1 = '<div class="custom-control custom-checkbox">
                        <input class="custom-control-input values" name="userselect[]"
                        value="'.$row1->id.'" type="checkbox" id="' . $row1->id.'">
                        <label class="custom-control-label" for="' . $row1->id.'"></label>
                        </div>';

                return $btn1;
                })
                ->editColumn('status', function($row){
                    if ($row->status == '1') {
                        $class = 'btn-success';
                        $url = url('admin/formation/status/' . $row->id . '/0');
                        $name = 'Active';
                    } else {
                        $class = 'btn-warning';
                        $url = url('admin/formation/status/' . $row->id . '/1');
                        $name = 'Inactive';
                    }
                    $btn = '<div class="col-md-2 row">
                   <a data-toggle="tooltip" href="' . $url . '" class="btn ' . $class . ' btn-sm btn-edit"><i class="icon-tick""></i>' . $name . '</a>
                    </div>';

                    return $btn;
                })
                ->addColumn('action', function($row){
//                    $btn = '<div class="col-md-8 row">
//                    <a data-toggle="tooltip" href="'.route('formation.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i
//                    class="icon-pencil"></i>Edit</a> <a data-toggle="tooltip" href="'.route('formation.destroy',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
//                    class="icon-trash2"></i>Delete</a>
//                    </div>';

                    $btn = '<div class="col-md-8 row">
                    <a data-toggle="tooltip" href="'.route('formation.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Eidt</a>
                    <a data-toggle="tooltip" href="'.route('formation.show',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-eye2"></i>Show</a>
                    <a data-toggle="tooltip" href="'.route('formation.destroy',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';

                    return $btn;
                })
                ->rawColumns(['check','status','action'])
                ->make(true);
        }
        return view('formation.list', compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Training_submissions::where('id',$id)->first();
        
        return view('formation.edit',compact('user'));
    }

    public function show($id)
    {
        $user = Training_submissions::where('id',$id)->first();
        $columns = Schema::getColumnListing('training_submissions');
        $data['result'] = ['method' => 'edit'];
        return view('formation.preview', $data, compact('user', 'columns'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training_submissions $training_submissions, $id)
    {
        $card = Training_submissions::where('id', $id)->delete();
        return redirect()->route('formation.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $cms = Training_submissions::whereIn('id', $ids)->delete();
        if ($cms) {
            $arr = ["success" => true, "message" => 'Selected Formation registrations Delete successfully.'];
            return $arr;
        }
    }

    public function status($id, $status)
    {
        // dd($id, $status);
        $user = Training_submissions::where('id', $id)->update(array('status' => $status));
        // dd($user);
        return redirect()->route('formation.index');
    }

    public function update(Request $request,$id){
        
        $submited_data = $request->input();
        $item = Training_submissions::where('id',$id)->first();
        if($request->cover_letter){
            $isExists = File::exists('assets/profile/'.$item->cover_letter);
            if ($isExists == true) {
                File::delete(public_path('assets/profile/' . $item->cover_letter));
            }
            $c_letter = time() . '-' . $request->cover_letter->getClientOriginalName();
            $request->cover_letter->move(public_path('assets/profile/'),$c_letter);
            $submited_data['cover_letter'] = $c_letter;
        }else{
            $c_letter = $item->cover_letter;
        }

        if($request->photo){
            $isExists = File::exists('assets/profile/'.$item->photo);
            if ($isExists == true) {
                File::delete(public_path('assets/profile/' . $item->photo));
            }
            $p_img = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('assets/profile/'),$p_img);
            $submited_data['photo'] = $p_img;
        }else{
            $p_img = $item->photo;
        }
        if($request->cv){
            $isExists = File::exists('assets/profile/'.$item->cv);
            if ($isExists == true) {
                File::delete(public_path('assets/profile/' . $item->cv));
            }
            $cv_img = time() . '-' . $request->cv->getClientOriginalName();
            $request->cv->move(public_path('assets/profile/'),$cv_img);
            $submited_data['cv'] = $cv_img;
        }else{
            $cv_img = $item->cv;
        }
        unset($submited_data['_token']);
        unset($submited_data['_method']);
        
        Training_submissions::where('id', $id)->update($submited_data);
        $submited_data['id'] = $id;
        $response_date = [
            'status' => true,
            'msg' => 'Your data updated successfully',
            'user' => (object)$submited_data
        ];

        return back();
    }
}
