<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\File;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::orderBy('id', 'DESC')->get();
        return view('instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.create');
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
        $profile_img->move(public_path('assets/instructor/'),$profile);

        $submited_data['profile'] = $profile;

        Instructor::create($submited_data);

        return response()->json(array(
            'message' => 'Instructor Successfully Added',
            'status' => true,
        ));
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
        $instructor = Instructor::where('id',$id)->first();
        return view('instructor.edit',compact('instructor'));
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

        $instructor = Instructor::where('id',$id)->first();
        if($request->profile){
            $isExists = File::exists('assets/instructor/'.$instructor->profile);
            if ($isExists == true) {
                File::delete(public_path('assets/instructor/' . $instructor->profile));
            }
            $profile = time() . rand(1, 99999). "." . $request->profile->getClientOriginalExtension();
            $request->profile->move(public_path('assets/instructor/'),$profile);
        }else{
            $profile = $instructor->profile;
        }
        Instructor::where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'profession_title' => $request->profession_title,
            'area_code' => $request->area_code,
            'profile' => $profile,
            'phone_number' => $request->phone_number,
            'postal_code' => $request->postal_code,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'pinterest' => $request->pinterest,
            'address' => $request->address,
            'gender' => $request->gender,
            'about_instructor' => $request->about_instructor,
        ]);
        return response()->json(array(
            'message' => 'Instructor Successfully Updated',
            'status' => true,
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instructor::where('id', $id)->delete();
        return response()->json(array(
            'message' => 'Instructor Successfully Deleted',
            'status' => true,
        ));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $course = Instructor::whereIn('id', $ids)->delete();
        if ($course) {
            $arr = ["success" => true, "message" => 'Selected instructor Delete successfully.'];
            return $arr;
        }
    }
}
