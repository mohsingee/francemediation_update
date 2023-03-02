<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Instructor;
use App\Models\Category;
use App\Models\SubCategory;
use Yajra\DataTables\DataTables;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = [];
        if ($request->ajax()) {
            $data = CourseModel::orderBy('id', 'DESC')->get();
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
                    $btn = '<div class="col-md-8">
                    <a data-toggle="tooltip" href="'.route('courses.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Eidt</a>
                    <a data-toggle="tooltip" href="'.route('courses.delete',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    <a data-toggle="tooltip" href="'.route('lectures.add',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1">Add Lecture</a>
                    <a data-toggle="tooltip" href="'.route('lectures.show',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1">View Lectures</a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['check','action'])
                ->make(true);
        }
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

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('courses.index', $response_date));
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

        return redirect()->route('courses.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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
        CourseModel::where('id', $id)->delete();
        return redirect()->route('courses.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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

    public function getCourses(Request $request){
        $data = CourseModel::where(["category"=>$request->category,"sub_category"=>$request->subCategory])->pluck("title","id");
        return response()->json($data);
    }
}
