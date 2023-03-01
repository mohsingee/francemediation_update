<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Category;
use App\Models\UserCourse;

class UserCourseController extends Controller
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
            $data = UserCourse::orderBy('id', 'DESC')->with('course')->get();
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
                    <a data-toggle="tooltip" href="'.route('user-course.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Eidt</a>
                    <a data-toggle="tooltip" href="'.route('user-course.delete',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';
                    return $btn;
                })
                ->addColumn('title', function (UserCourse $data) {
                    return $course = $data->course->title;
                })
                ->addColumn('price', function (UserCourse $data) {
                    return $price = $data->course->price;
                })
                ->rawColumns(['check','action','title','price'])
                ->make(true);
        }
        return view('students.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('students.course.create',compact('categories'));
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
            'course' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
        ]);
        UserCourse::create([
            'user_id'=>Auth::user()->id,
            'course_id'=>$request->course,
        ]);
        return redirect()->route('user-course.index')->with('success','Course selected successfully.');
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
        $categories = Category::all();
        $course = UserCourse::where('id',$id)->first();
        return view('students.course.edit',compact('categories','course'));
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
            'course' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
        ]);
        UserCourse::where('id',$id)->update([
            'course_id'=>$request->course,
        ]);
        return redirect()->route('user-course.index')->with('success','Course updated successfully.');
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
        UserCourse::where('id', $id)->delete();
        return redirect()->route('user-course.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }
}
