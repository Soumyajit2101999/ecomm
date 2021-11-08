<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class ProductController extends Controller
{
    function product_detail($id){
        $product = Session::get('product');
        
        foreach($product as $pro){
            if($pro->pro_id == $id){
                $pro_detail = array($pro);
                break;
            }
        }
        //return print_r($pro_detail);
        Session::put('pro_detail',$pro_detail);
        return view('frontend.product_detail',['pro_detail'=>$pro_detail]);
    }

    function add_pin_checker(Request $request){
        $request->validate([
            'add_pin'=>'required'
        ]);
        $user_id = 3;
        $data = array();
   	    $data['user_id'] = $user_id;
   	    $data['user_pin'] = $request->add_pin;
       $insert = DB::table('address')->insert( $data );
       return redirect()->back()->with('pin_check','Your form has been sent sucessfully');
    }

    function pin_check(Request $request){
        Session::put('u',$request->given_pin);
        return redirect()->back();

    }
    
}
