<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $submited_data = $request->input();
        unset($submited_data['_token']);
        
        $img = $request->image;
        $image = time() . '-' . $img->getClientOriginalName();
        $img->move(public_path('assets/category/'),$image);
        
        $submited_data['image'] = $image;
        $submited_data['added_by'] = Auth::user()->id;

        Category::create($submited_data);

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('categories.index', $response_date));
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
        $category = Category::where('id',$id)->first();
        return view('category.edit',compact('category'));
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

        $category = Category::where('id',$id)->first();
        if($request->image){
            $isExists = File::exists('assets/category/'.$category->image);
            if ($isExists == true) {
                File::delete(public_path('assets/category/' . $category->image));
            }
            $img = time() . rand(1, 99999). "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/category/'),$img);
        }else{
            $img = $category->image;
        }

        Category::where('id',$id)->update([
            'title' => $request->title,
            'image' => $img
        ]);
        return redirect()->route('categories.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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
        Category::where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $category = Category::whereIn('id', $ids)->delete();
        if ($category) {
            $arr = ["success" => true, "message" => 'Selected Categories Delete successfully.'];
            return $arr;
        }
    }
}
