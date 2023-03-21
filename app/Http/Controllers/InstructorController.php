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

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('instructor.index', $response_date));
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
        //
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
        Instructor::where('id', $id)->delete();
        return redirect()->route('instructor.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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
