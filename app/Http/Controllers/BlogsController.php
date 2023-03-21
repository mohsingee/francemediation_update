<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blog_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Validator;
use Illuminate\Support\Facades\File;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'banner_img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail_img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail_img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);
        $submited_data = $request->input();
        unset($submited_data['_token']);
        // banner_img
        $b_img = $request->banner_img;
        $banner_img = time() . '-' . $b_img->getClientOriginalName();
        $b_img->move(public_path('assets/blogs/'),$banner_img);
        
        // thumbnail_img
        $t_img = $request->thumbnail_img;
        $thumbnail_img = time() . '-' . $t_img->getClientOriginalName();
        $t_img->move(public_path('assets/blogs/'),$thumbnail_img);
       
        // detail_img
        $d_cv = $request->detail_img;
        $detail_img = time() . '-' . $d_cv->getClientOriginalName();
        $d_cv->move(public_path('assets/blogs/'),$detail_img);

        $submited_data['banner_img'] = $banner_img;
        $submited_data['detail_img'] = $detail_img;
        $submited_data['thumbnail_img'] = $thumbnail_img;

        Blog::create($submited_data);

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('blogs.index', $response_date));
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
        $blog = Blog::where('id',$id)->first();
        return view('blogs.edit',compact('blog'));
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
            'author' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);

        $blog = Blog::where('id',$id)->first();
        if($request->thumbnail_img){
            $isExists = File::exists('assets/blogs/'.$blog->thumbnail_img);
            if ($isExists == true) {
                File::delete(public_path('assets/blogs/' . $blog->thumbnail_img));
            }
            $t_img = time() . rand(1, 99999). "." . $request->thumbnail_img->getClientOriginalExtension();
            $request->thumbnail_img->move(public_path('assets/blogs/'),$t_img);
        }else{
            $t_img = $blog->thumbnail_img;
        }

        if($request->banner_img){
            $isExists = File::exists('assets/blogs/'.$blog->banner_img);
            if ($isExists == true) {
                File::delete(public_path('assets/blogs/' . $blog->banner_img));
            }
            $b_img = time() . rand(1, 99999). "." . $request->banner_img->getClientOriginalExtension();
            $request->banner_img->move(public_path('assets/blogs/'),$b_img);
        }else{
            $b_img = $blog->banner_img;
        }

        if($request->detail_img){
            $isExists = File::exists('assets/blogs/'.$blog->detail_img);
            if ($isExists == true) {
                File::delete(public_path('assets/blogs/' . $blog->detail_img));
            }
            $d_img = time() . rand(1, 99999). "." . $request->detail_img->getClientOriginalExtension();
            $request->detail_img->move(public_path('assets/blogs/'),$d_img);
        }else{
            $d_img = $blog->detail_img;
        }
        Blog::where('id',$id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'banner_img' => $b_img,
            'thumbnail_img' => $t_img,
            'detail_img' => $d_img,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        return redirect()->route('blogs.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        //
    }

    public function delete($id)
    {
        Blog::where('id', $id)->delete();
        return redirect()->route('blogs.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $blogs = Blog::whereIn('id', $ids)->delete();
        if ($blogs) {
            $arr = ["success" => true, "message" => 'Selected Blogs Delete successfully.'];
            return $arr;
        }
    }
}
