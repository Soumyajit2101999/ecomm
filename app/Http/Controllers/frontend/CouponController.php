<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class CouponController extends Controller
{
    function apply(Request $request){
        $coupon = DB::table('coupon')->get();
        foreach($coupon as $coupon){
            if($coupon->coupon == $request->coupon){
                Session::put('coupon',$coupon->coupon);
                Session::put('coupon_price',$coupon->coupon_price);
                break;
            }
        }
        //return Session::get('coupon');
        return redirect()->back();
    }
}
