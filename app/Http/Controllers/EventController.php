<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Testing\Fakes\EventFake;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = [];
        if ($request->ajax()) {
            $data = EventModel::orderBy('id', 'DESC')->get();
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
                    <a data-toggle="tooltip" href="'.route('events.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i class="icon-pencil"></i>Eidt</a>
                    <a data-toggle="tooltip" href="'.route('events.delete',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['check','action'])
                ->make(true);
        }
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'event_date' => 'required|string|max:255',
            'event_duration' => 'required|string|max:255',
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
        $b_img->move(public_path('assets/events/'),$banner_img);
        
        // thumbnail_img
        $t_img = $request->thumbnail_img;
        $thumbnail_img = time() . '-' . $t_img->getClientOriginalName();
        $t_img->move(public_path('assets/events/'),$thumbnail_img);
       
        // detail_img
        $d_cv = $request->detail_img;
        $detail_img = time() . '-' . $d_cv->getClientOriginalName();
        $d_cv->move(public_path('assets/events/'),$detail_img);

        $submited_data['banner_img'] = $banner_img;
        $submited_data['detail_img'] = $detail_img;
        $submited_data['thumbnail_img'] = $thumbnail_img;

        EventModel::create($submited_data);

        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('events.index', $response_date));
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
        $event = EventModel::where('id',$id)->first();
        return view('events.edit',compact('event'));
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
            'event_date' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);

        $event = EventModel::where('id',$id)->first();
        if($request->thumbnail_img){
            $isExists = File::exists('assets/events/'.$event->thumbnail_img);
            if ($isExists == true) {
                File::delete(public_path('assets/events/' . $event->thumbnail_img));
            }
            $t_img = time() . rand(1, 99999). "." . $request->thumbnail_img->getClientOriginalExtension();
            $request->thumbnail_img->move(public_path('assets/events/'),$t_img);
        }else{
            $t_img = $event->thumbnail_img;
        }

        if($request->banner_img){
            $isExists = File::exists('assets/events/'.$event->banner_img);
            if ($isExists == true) {
                File::delete(public_path('assets/events/' . $event->banner_img));
            }
            $b_img = time() . rand(1, 99999). "." . $request->banner_img->getClientOriginalExtension();
            $request->banner_img->move(public_path('assets/events/'),$b_img);
        }else{
            $b_img = $event->banner_img;
        }

        if($request->detail_img){
            $isExists = File::exists('assets/events/'.$event->detail_img);
            if ($isExists == true) {
                File::delete(public_path('assets/events/' . $event->detail_img));
            }
            $d_img = time() . rand(1, 99999). "." . $request->detail_img->getClientOriginalExtension();
            $request->detail_img->move(public_path('assets/events/'),$d_img);
        }else{
            $d_img = $event->detail_img;
        }
        EventModel::where('id',$id)->update([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'event_duration' => $request->event_duration,
            'banner_img' => $b_img,
            'thumbnail_img' => $t_img,
            'detail_img' => $d_img,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        return redirect()->route('events.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
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
        EventModel::where('id', $id)->delete();
        return redirect()->route('events.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $events = EventModel::whereIn('id', $ids)->delete();
        if ($events) {
            $arr = ["success" => true, "message" => 'Selected Events Delete successfully.'];
            return $arr;
        }
    }
}
