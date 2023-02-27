<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Student;
use Illuminate\Support\Facades\File;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student = [];
        if ($request->ajax()) {
            $data = Student::orderBy('id', 'DESC')->get();
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
                ->addColumn('action', function($row){
                    $btn = '<div class="col-md-8 row">
                    <a data-toggle="tooltip" href="'.route('students.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Eidt</a>
                    <a data-toggle="tooltip" href="'.route('students.delete',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['check','action'])
                ->make(true);
        }
        return view('students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);
        $submited_data = $request->input();
        unset($submited_data['_token']);

        $profile_img = $request->profile;
        $profile = time() . '-' . $profile_img->getClientOriginalName();
        $profile_img->move(public_path('assets/students/'),$profile);

        $submited_data['profile'] = $profile;

        Student::create($submited_data);

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('students.index', $response_date));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);
        $student = Student::where('id',$id)->first();
        if($request->profile){
            $isExists = File::exists('assets/students/'.$student->profile);
            if ($isExists == true) {
                File::delete(public_path('assets/students/' . $student->profile));
            }
            $p_img = time() . rand(1, 99999). "." . $request->profile->getClientOriginalExtension();
            $request->profile->move(public_path('assets/students/'),$p_img);
        }else{
            $p_img = $student->profile;
        }

        Student::where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'area_code' => $request->area_code,
            'profile' => $p_img,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'gender' => $request->gender,
            'about_student' => $request->about_student,
        ]);

        $response_date = [
            'status' => true,
            'msg' => 'Profile updated successfully'
        ];

        return redirect(route('students.index', $response_date));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('students.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $course = Student::whereIn('id', $ids)->delete();
        if ($course) {
            $arr = ["success" => true, "message" => 'Selected student Delete successfully.'];
            return $arr;
        }
    }
}
