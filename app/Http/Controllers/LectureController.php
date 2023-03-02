<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Lecture;
class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add($id){
        $course = CourseModel::where('id',$id)->first();
        return view('lectures.create',compact('course'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);
        if($request->file=='' && $request->youtube_link=='' && $request->vimeo_link==''){
            return redirect()->back()->with('error','youtube link,vimeo link or file you must one field are filled.');
        }
        if($request->file){
            $file_name = time() . '-' . $request->file->getClientOriginalName();
            $request->file->move(public_path('assets/courses/lectures/'),$file_name);
        }else{
            $file_name= null;
        }
        Lecture::create([
            'course_id'=>$request->course_id,
            'title'=>$request->title,
            'duration'=>$request->duration,
            'youtube_link'=>$request->youtube_link,
            'vimeo_link'=>$request->vimeo_link,
            'file'=>$file_name,
        ]);
        return redirect()->route('lectures.show',$request->course_id)->with('success','Lecture save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lectures = Lecture::where('course_id',$id)->with('course')->get();
        return view('lectures.index',compact('lectures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::where('id',$id)->with('course')->first();
        return view('lectures.edit',compact('lecture'));
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
            'title' => 'required|string|max:255',
        ]);
        if($request->file=='' && $request->youtube_link=='' && $request->vimeo_link==''){
            return redirect()->back()->with('error','youtube link,vimeo link or file you must one field are filled.');
        }
        if($request->file){
            $file_name = time() . '-' . $request->file->getClientOriginalName();
            $request->file->move(public_path('assets/courses/lectures/'),$file_name);
        }else{
            if($request->youtube_link =='' && $request->vimeo_link ==''){
                $lecture = Lecture::where('id',$id)->first();
                $file_name= $lecture->file;
            }else{
                $file_name =null;
            }
        }
        Lecture::where('id',$id)->update([
            'title'=>$request->title,
            'duration'=>$request->duration,
            'youtube_link'=>$request->youtube_link,
            'vimeo_link'=>$request->vimeo_link,
            'file'=>$file_name,
        ]);
        return redirect()->route('lectures.show',$request->course_id)->with('success','Lecture updated successfully.');
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

    public function delete($id){
        Lecture::where('id', $id)->delete();
        return redirect()->route('lectures.show',$id)->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $lecture = Lecture::whereIn('id', $ids)->delete();
        if ($lecture) {
            $arr = ["success" => true, "message" => 'Selected lecture delete successfully.'];
            return $arr;
        }
    }
}
