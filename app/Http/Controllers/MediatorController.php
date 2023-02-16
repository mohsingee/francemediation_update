<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Training_submissions;
use App\Models\Mediator_submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MediatorController extends Controller
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
            $data = Mediator_submissions::orderBy('id', 'DESC')->get();
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
                ->editColumn('region', function ($row1) {
                    $regions = array (
                        0 => 'Auvergne-rhone-alpes',
                        1 => 'Bourgogne-Franche-Comté',
                        2 => 'Bretagne',
                        3 => 'Centre-Val de Loire',
                        4 => 'Corse',
                        5 => 'Grand-Est',
                        6 => 'Guadeloupe',
                        7 => 'Guyane',
                        8 => 'Hauts-de-France',
                        9 => 'Île-de-France',
                        10 => 'Martinique',
                        11 => 'Mayotte',
                        12 => 'Normandie',
                        13 => 'Nouvelle-Aquitaine',
                        14 => 'Occitanie',
                        15 => 'Pays de la Loire',
                        16 => 'Provence-Alpes Côte d\'Azur',
                        17 => 'Réunion',
                    );
                    $val = $regions[$row1->region];

                    return $val;
                })
                ->editColumn('status', function ($row1) {
                    if ($row1->status == '1') {
                        $class = 'btn-success';
                        $url = url('admin/mediator/status/' . $row1->id . '/0');
                        $name = 'Active';
                    } else {
                        $class = 'btn-warning';
                        $url = url('admin/mediator/status/' . $row1->id . '/1');
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
                    <a data-toggle="tooltip" href="'.route('mediator.edit',$row->id).'" class="btn btn-info btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Edit</a>
                    <a data-toggle="tooltip" href="'.route('mediator.show',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-eye2"></i>View</a>
                    <a data-toggle="tooltip" href="'.route('mediator.destroy',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';

                    return $btn;
                })
                ->rawColumns(['check','region','status','action'])
                ->make(true);
        }
        return view('mediator.list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Mediator_submissions::where('id',$id)->first();
        return view('mediator.edit',compact('user'));
    }

    public function show($id)
    {
        // dd($id);
        $user = Mediator_submissions::where('id',$id)->first();
        $columns = Schema::getColumnListing('mediator_submissions');
        $data['result'] = ['method' => 'edit'];
        return view('mediator.preview', $data, compact('user', 'columns'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mediator_submissions $mediator_submissions, $id)
    {
        $card = Mediator_submissions::where('id', $id)->delete();
        return redirect()->route('mediator.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $cms = Mediator_submissions::whereIn('id', $ids)->delete();
        if ($cms) {
            $arr = ["success" => true, "message" => 'Selected Mediator Registrations Delete successfully.'];
            return $arr;
        }
    }

    public function status($id, $status)
    {
        // dd($id, $status);
        $user = Mediator_submissions::where('id', $id)->update(array('status' => $status));
        // dd($user);
        return redirect()->route('mediator.index');
    }

    public function update(Request $request,$id){
        $item = Mediator_submissions::where('id',$id)->first();
        if($request->profile){
            $isExists = File::exists('assets/profile/'.$item->profile);
            if ($isExists == true) {
                File::delete(public_path('assets/profile/' . $item->profile));
            }
            $file = time() . '-' . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/profile/'),$file);
        }else{
            $file = $item->profile;
        }

        Mediator_submissions::where('id',$id)->update([
            'civility'=>$request->civility,
            'region'=>$request->region,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'dob'=>$request->dob,
            'email'=>$request->email,
            'personal_email'=>$request->personal_email,
            'address'=>$request->address,
            'street'=>$request->street,
            'additional_address'=>$request->additional_address,
            'city'=>$request->city,
            'postal_code'=>$request->postal_code,
            'country'=>$request->country,
            'phone_number'=>$request->phone_number,
            'profile'=>$file,
            'professional_situation'=>$request->professional_situation,
            'charge_person_phone'=>$request->charge_person_phone,
            'charge_person_email'=>$request->charge_person_email,
            'professional_expereince'=>$request->professional_expereince,
            'work_force'=>$request->work_force,
            'mediator_expereince'=>$request->mediator_expereince,
            'conventional_mediation'=>$request->conventional_mediation,
            'judicial_mediation'=>$request->judicial_mediation,
            'name_of_insurer'=>$request->name_of_insurer,
            'policy_number'=>$request->policy_number,
            'member_of_mediation'=>$request->member_of_mediation,
            'apeal_of_region'=>$request->apeal_of_region,
            'appeal_court'=>$request->appeal_court,         
        ]);

        return redirect()->route('mediator.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }
}
