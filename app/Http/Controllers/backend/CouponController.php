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
    }
}
