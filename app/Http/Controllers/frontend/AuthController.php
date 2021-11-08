<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\people;
use Illuminate\Support\Facades\Hash;
use DB;
class AuthController extends Controller
{
    function register(){
        return view('frontend.register');
    }
    function login(){
        return view('frontend.login');
    }
    function save(Request $request){
        //return $request->input();

        //validate
        $request->validate([

            'name'=>'required',
            'address'=>'required',
            'pin'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'email'=>'required|email|unique:people',
            'password'=>['required','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'],
            'confirm_password'=>'required'
        ]);

        if($request->password == $request->confirm_password)
{
    $user = new people;
    $user->name = $request->name;
    $user->address = $request->address;
    $user->pin = $request->pin;
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->email = $request->email;
    $user->password = Hash::make($request->confirm_password);
    $save = $user->save();
    if($save){
        return back()->with('success','You are succesfuly Registered');
    }
    else{
        return back()->with('fail','Something Went Wrong');
    }
}
else{
    return back()->with('fail','Confirm password does not match');
}
    }

    function check(Request $request){
        //return $request->input();

        //validate
        $request->validate([

            'email'=>'required|email',
            'password'=>'required|'
        ]);
        $userInfo = people::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','Please Register Yourself');
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('user_id',$userInfo->user_id);
                $request->session()->put('name',$userInfo->name);
                $request->session()->put('email',$userInfo->email);
                $request->session()->put('address',$userInfo->address);
                //$request->session()->put('u',$userInfo->pin);
                $request->session()->put('phone',$userInfo->phone);
                $request->session()->put('gender',$userInfo->gender);
                $non_pin_pro = array();
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key=>$value){
                                         $user_id = $request->session()->get('user_id');
                                         $Query = DB::table('cart')->where('user_id',$user_id)->where('pro_id',$key)->count();
                                         if($Query == 0){
                                            $data = array();
                                            $data['user_id'] = $request->session()->get('user_id');
                                            $data['pro_id'] = $key;
                                            $data['pro_quan'] = $value['quan'];
                                            $query = DB::table('cart')->insert($data);
                                        }        
                    }
                    unset($_SESSION['cart']);
                }
                return redirect()->route('frontend.index');
            }
            else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    function logout(){
        if(session()->has('user_id')){
            session()->pull('user_id');
            return redirect('/frontend/register');
        }
    }
}
