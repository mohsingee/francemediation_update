<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Training_submissions;
use App\Models\Mediator_submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MediatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  Mediator_submissions::orderBy('id', 'DESC')->get();
        return view('mediator.list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Mediator_submissions::where('id',$id)->first();
        return view('mediator.edit',compact('user'));
    }

    public function show($id)
    {
        // dd($id);
        $user = Mediator_submissions::where('id',$id)->first();
        $columns = Schema::getColumnListing('mediator_submissions');
        $data['result'] = ['method' => 'edit'];
        return view('mediator.preview', $data, compact('user', 'columns'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mediator_submissions $mediator_submissions, $id)
    {
        $card = Mediator_submissions::where('id', $id)->delete();
        return response()->json(array(
            'message' => 'Mediator user Successfully Deleted',
            'status' => true,
        ));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $cms = Mediator_submissions::whereIn('id', $ids)->delete();
        if ($cms) {
            $arr = ["success" => true, "message" => 'Selected Mediator Registrations Delete successfully.'];
            return $arr;
        }
    }

    public function status($id, $status)
    {
        // dd($id, $status);
        $user = Mediator_submissions::where('id', $id)->update(array('status' => $status));
        // dd($user);
        return redirect()->route('mediator.index');
    }

    public function update(Request $request,$id){
        $item = Mediator_submissions::where('id',$id)->first();
        if($request->profile){
            $isExists = File::exists('assets/profile/'.$item->profile);
            if ($isExists == true) {
                File::delete(public_path('assets/profile/' . $item->profile));
            }
            $file = time() . '-' . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/profile/'),$file);
        }else{
            $file = $item->profile;
        }

        Mediator_submissions::where('id',$id)->update([
            'civility'=>$request->civility,
            'region'=>$request->region,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'dob'=>$request->dob,
            'email'=>$request->email,
            'personal_email'=>$request->personal_email,
            'address'=>$request->address,
            'street'=>$request->street,
            'additional_address'=>$request->additional_address,
            'city'=>$request->city,
            'postal_code'=>$request->postal_code,
            'country'=>$request->country,
            'phone_number'=>$request->phone_number,
            'profile'=>$file,
            'professional_situation'=>$request->professional_situation,
            'charge_person_phone'=>$request->charge_person_phone,
            'charge_person_email'=>$request->charge_person_email,
            'professional_expereince'=>$request->professional_expereince,
            'work_force'=>$request->work_force,
            'mediator_expereince'=>$request->mediator_expereince,
            'conventional_mediation'=>$request->conventional_mediation,
            'judicial_mediation'=>$request->judicial_mediation,
            'name_of_insurer'=>$request->name_of_insurer,
            'policy_number'=>$request->policy_number,
            'member_of_mediation'=>$request->member_of_mediation,
            'apeal_of_region'=>$request->apeal_of_region,
            'appeal_court'=>$request->appeal_court,         
        ]);

        return response()->json(array(
            'message' => 'Mediator user Successfully Updated',
            'status' => true,
        ));
    }
}
