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
        $tutorial = Lecture::where(['course_id'=>$id,'selected'=>1])->first();
        if(empty($tutorial)){
            $tutorial = Lecture::where(['course_id'=>$id,'selected'=>0])->orderBy('id','DESC')->first();
        }
        return view('students/enroll/index',compact('course','tutorial'));
    }
    
    public function show($id){
        $tutorial = Lecture::where('id',$id)->first();
        Lecture::where('course_id',$tutorial->course_id)->update(['selected'=>0]);
        Lecture::where('id',$id)->update(['selected'=>1]);
        $course = CourseModel::where('id',$tutorial->course_id)->with(['lectures' => function ($query){
            $query->orderBy('id','DESC');
        }])->first();
        return view('students/enroll/show',compact('course','tutorial'));
    }
}
