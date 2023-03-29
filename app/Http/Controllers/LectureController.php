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
        if($request->youtube_link){
            $link = $this->convertYoutube($request->youtube_link);
        }else{
            $link = null;
        }
        if($request->vimeo_link){
            $vimeo_url = 'https://player.vimeo.com/video/';
            $v = substr( strrchr(  $request->vimeo_link, '/' ), 1 );
            $vlink = $vimeo_url . $v;
        }else{
            $vlink = null;
        }
        Lecture::create([
            'course_id'=>$request->course_id,
            'title'=>$request->title,
            'duration'=>$request->duration,
            'youtube_link'=>$link,
            'vimeo_link'=>$vlink,
            'file'=>$file_name,
        ]);
        return response()->json(array(
            'message' => 'Lecture Successfully Added',
            'status' => true,
        ));
    }

    function convertYoutube($string) {
        return preg_replace(
            "/[a-zA-Z\/\/:\.]*youtu(?:be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)(?:[&?\/]t=)?(\d*)(?:[a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "https://www.youtube.com/embed/$1?start=$2",
            $string
        );
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
        if($request->youtube_link){
            $link = $this->convertYoutube($request->youtube_link);
        }else{
            $link = null;
        }
        if($request->vimeo_link){
            $vimeo_url = 'https://player.vimeo.com/video/';
            $v = substr( strrchr(  $request->vimeo_link, '/' ), 1 );
            $vlink = $vimeo_url . $v;
        }else{
            $vlink = null;
        }
        Lecture::where('id',$id)->update([
            'title'=>$request->title,
            'duration'=>$request->duration,
            'youtube_link'=>$link,
            'vimeo_link'=>$vlink,
            'file'=>$file_name,
        ]);
        return response()->json(array(
            'message' => 'Lecture Successfully Updated',
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
        Lecture::where('id', $id)->delete();
        return response()->json(array(
            'message' => 'Lecture Successfully Deleted',
            'status' => true,
        ));
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
