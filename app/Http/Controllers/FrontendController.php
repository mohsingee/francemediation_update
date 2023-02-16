<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\User;
use App\Models\Blog;
use Session;
use App\Models\Training_submissions;
use App\Models\Mediator_submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function about_us()
    {
        return view('frontend.pages.about');
    }

    public function formation()
    {
        return view('frontend.pages.formation');
    }

    public function nouvelles()
    {
        return view('frontend.pages.events');
    }

    public function mediation()
    {
        return view('frontend.pages.mediation');
    }

    public function blogue()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.blogue',compact('blogs'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function mediater()
    {
        return view('frontend.pages.mediater_form');
    }

    public function formation_submission(Request $request){
        //dd($_FILES);
        //dd($request->input());
        $submited_data = $request->input();
        unset($submited_data['_token']);
        // Letter
        $cover_letter = $request->cover_letter;
        $letter_img = time() . '-' . $cover_letter->getClientOriginalName();
        $cover_letter->move(public_path('assets/profile/'),$letter_img);
        
        // photo
        $photo = $request->photo;
        $photo_img = time() . '-' . $photo->getClientOriginalName();
        $photo->move(public_path('assets/profile/'),$photo_img);
       
        // cv
        $cv = $request->cv;
        $cv_img = time() . '-' . $cv->getClientOriginalName();
        $cv->move(public_path('assets/profile/'),$cv_img);

        $submited_data['cover_letter'] = $letter_img;
        $submited_data['photo'] = $photo_img;
        $submited_data['cv'] = $cv_img;

        $formation = Training_submissions::create($submited_data);
        Session::put('formation_id', $formation->id);
        return redirect()->route('paypal.pay',1);
        // $response_date = [
        //     'status' => true,
        //     'msg' => 'Your data added successfully'
        // ];

        // return view('frontend.pages.formation', $response_date);
    }

    public function mediator_submission(Request $request){
        //dd($_FILES);
        //dd($request->input());
        $submited_data = $request->input();
        unset($submited_data['_token']);

        $img = $request->profile;
        $fileName = time() . '-' . $img->getClientOriginalName();
        $img->move(public_path('assets/profile/'),$fileName);
        $submited_data['profile'] = $fileName;

        $added = Mediator_submissions::create($submited_data);
        $response_date = [
            'status' => true,
            'msg' => 'Your data added successfully'
        ];

        return redirect(route('page.mediator', $response_date));
        //return Redirect::route('clients.show, $id')
    }
}
