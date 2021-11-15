<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CouponController extends Controller
{
    function coupon_view(){
    $coupon = DB::table('coupon')->get();
    return view('backend.coupon',['coupon'=>$coupon]);
    }

    function post(Request $request){
        $coupons = array();
        $coupons['coupon'] = $request->coupon_name;
        $coupons['coupon_price'] = $request->coupon_price;

        $insert = DB::table('coupon')->insert($coupons);
        return redirect()->back()->with('success',"Successfylly submitted");
    }

    function coupon_delete($id){
        $delete = DB::table('coupon')->where( 'coupon_id', $id )->delete();

   	if( $delete )
		   return redirect()->back()->with('success','Deleted Successfully');
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
    }
}
