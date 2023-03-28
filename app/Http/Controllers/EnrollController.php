<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Lecture;

class EnrollController extends Controller
{
    public function index($id){
        $course = CourseModel::where('id',$id)->with(['lectures' => function ($query){
            $query->orderBy('id','DESC');
        }])->first();
        $tutorial = Lecture::orderBy('id','DESC')->where('status',0)->first();
        return view('students/enroll/index',compact('course','tutorial'));
    }
    
    public function show($id){
        $tutorial = Lecture::where('id',$id)->first();
        $course = CourseModel::where('id',$tutorial->course_id)->with(['lectures' => function ($query){
            $query->orderBy('id','DESC');
        }])->first();
        return view('students/enroll/show',compact('course','tutorial'));
    }
}
