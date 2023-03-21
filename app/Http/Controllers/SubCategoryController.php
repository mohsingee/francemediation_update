<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category = SubCategory::orderBy('id', 'DESC')->with('categories')->get();
        return view('sub_category.index', compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('sub_category.create',compact('category'));
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
        $img->move(public_path('assets/sub_category/'),$image);
        
        $submited_data['image'] = $image;

        SubCategory::create($submited_data);

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('sub_categories.index', $response_date));
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
        $sub_category = SubCategory::where('id',$id)->first();
        $category = Category::all();
        return view('sub_category.edit',compact('category','sub_category'));
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

        $sub_category = SubCategory::where('id',$id)->first();
        if($request->image){
            $isExists = File::exists('assets/sub_category/'.$sub_category->image);
            if ($isExists == true) {
                File::delete(public_path('assets/sub_category/' . $sub_category->image));
            }
            $img = time() . rand(1, 99999). "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/sub_category/'),$img);
        }else{
            $img = $sub_category->image;
        }

        SubCategory::where('id',$id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image' => $img
        ]);
        return redirect()->route('sub_categories.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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
        SubCategory::where('id', $id)->delete();
        return redirect()->route('sub_categories.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $subCategory = SubCategory::whereIn('id', $ids)->delete();
        if ($subCategory) {
            $arr = ["success" => true, "message" => 'Selected Categories Delete successfully.'];
            return $arr;
        }
    }
}
