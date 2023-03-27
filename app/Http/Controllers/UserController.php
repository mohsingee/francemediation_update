<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['result'] = ['method' => 'add'];
        return view('users.form', $data);
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',
            'image' => 'required',
        ]);

        $image = $request->image;
        $user_image = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/'),$user_image);
            
        User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'username'=>$request->username,
            'image'=>$user_image,
            'role'=>0,
            'email'=>$request->email,
            'login_type'=>1,
            'status'=>1,
            'password'=>bcrypt($request->password),
        ]);
        return response()->json(array(
            'message' => 'User Successfully added',
            'status' => true,
        ));
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
        $user = User::find($id);
        $data['result'] = ['method' => 'edit'];
        return view('users.form', $data, compact('user'));
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required',
        ]);
        $user = User::where('id',$id)->first();
        if($request->image){
            $image = $request->image;
            $user_image = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/'),$user_image);
        }else{
            $user_image = $user->image;
        }
            
        User::where('id',$id)->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'username'=>$request->username,
            'image'=>$user_image,
            'role'=>0,
            'email'=>$request->email,
            'login_type'=>1,
            'status'=>1,
        ]);
        return response()->json(array(
            'message' => 'User Successfully updated',
            'status' => true,
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
        $user = User::where('id', $id)->delete();
        return response()->json(array(
            'message' => 'User Successfully Deleted',
            'status' => true,
        ));
    }

    public function status($id, $status)
    {
        $user = User::where('id', $id)->update(array('status' => $status));
        return redirect()->route('user.index');
    }

    public function deleteAllUser(Request $request)
    {
        $ids = $request->ids;
        $user = User::whereIn('id', $ids)->delete();
        if ($user) {
            $arr = ["success" => true, "message" => 'Selected User Delete successfully.'];
            return $arr;
        }
    }
}
