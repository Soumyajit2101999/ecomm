<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\people;
class ProfileController extends Controller
{
    function profile_view(){
        return view('frontend.profile');
    }
    function profile_update(Request $request){
        $request->validate([

            'name'=>'required',
            'address'=>'required',
            'pin'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'email'=>'required|email|'
        ]);
    $user = array();
    $user['name'] = $request->name;
    $user['address'] = $request->address;
    $user['pin'] = $request->pin;
    $user['phone'] = $request->phone;
    $user['gender'] = $request->gender;
    $user['email'] = $request->email;
    $userInfo = DB::table('people')->where( 'user_id', Session::get('user_id') )->update($user);
    if($userInfo){
                Session::put('name',$request->name);
                Session::put('email',$request->email);
                Session::put('address',$request->address);
                Session::put('u_pin',$request->pin);
                Session::put('phone',$request->phone);
                Session::put('gender',$request->gender);
        return back()->with('success','You are succesfuly Updated');
    }
    else{
        return back()->with('fail','Something Went Wrong');
    }
    }
}
