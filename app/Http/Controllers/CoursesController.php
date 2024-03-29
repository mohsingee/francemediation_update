<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Instructor;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseModel::orderBy('id', 'DESC')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Instructor::all();
        $categories = Category::all();
        return view('courses.create',compact('users','categories'));
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
            'instructor' => 'required',
            'title' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'sub_category' => 'required',
            'price' => 'required',
        ]);
        $submited_data = $request->input();
        unset($submited_data['_token']);

        $course_img = $request->image;
        $img = time() . '-' . $course_img->getClientOriginalName();
        $course_img->move(public_path('assets/courses/'),$img);

        $submited_data['image'] = $img;

        CourseModel::create($submited_data);

        return response()->json(array(
            'message' => 'Course Successfully Added',
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
        $users = Instructor::all();
        $course = CourseModel::where('id',$id)->first();
        $categories = Category::all();
        $sub_categories = SubCategory::where('category_id',$course->category)->get();
        return view('courses.edit',compact('course','users','categories','sub_categories'));
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
            'instructor' => 'required',
            'title' => 'required|string|max:255',
            'category' => 'required',
            'sub_category' => 'required',
            'price' => 'required',
        ]);

        $course = CourseModel::where('id',$id)->first();
        if($request->image){
            $isExists = File::exists('assets/courses/'.$course->image);
            if ($isExists == true) {
                File::delete(public_path('assets/courses/' . $course->image));
            }
            $t_img = time() . rand(1, 99999). "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/courses/'),$t_img);
        }else{
            $t_img = $course->image;
        }

        CourseModel::where('id',$id)->update([
            'instructor' => $request->instructor,
            'title' => $request->title,
            'image' => $t_img,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'price' => $request->price
        ]);
        return response()->json(array(
            'message' => 'Course Successfully Updated',
            'status' => 'success',
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
        CourseModel::where('id', $id)->delete();
        return response()->json(array(
            'message' => 'Course Successfully Deleted',
            'status' => true,
        ));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $course = CourseModel::whereIn('id', $ids)->delete();
        if ($course) {
            $arr = ["success" => true, "message" => 'Selected course delete successfully.'];
            return $arr;
        }
    }

    public function getSubCategory($id){
        $data = SubCategory::where("category_id",$id)->pluck("title","id");
        return response()->json($data);
    }

    public function getCourses($id){
        $course = CourseModel::where(["sub_category"=>$id])->first();
        $data = CourseModel::where(["sub_category"=>$id])->get();
        $html = view('students/course/courses',compact('data','course'))->render();
        return response()->json([
            'status'=>true,
            'message'=>"data recieved",
            'html'=>$html,
        ]);
    }
}
