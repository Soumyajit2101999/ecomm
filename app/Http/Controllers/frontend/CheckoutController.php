<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function view(){
        return view('frontend.checkout');
    }

    function process(Request $request){
        //return $request->input();

        $request->validate([
            'order_fname'=>'required',
            'order_lname'=>'required',
            'order_state'=>'required',
            'order_address'=>'required',
            'order_city'=>'required',
            'order_zip'=>'required',
            'order_phone'=>'required',
            'optradio'=>'required'
        ]);

        date_default_timezone_set("Asia/Kolkata");
        $order_date = date("Y-m-d h:i:sa");
        $Order_date = date("Y-m-d");
        $payment_status = htmlspecialchars(mysqli_real_escape_string($db_connection,"Pending"));
        date_default_timezone_set("Asia/Kolkata");
        $delivery_date = date("Y-m-d",strtotime($Order_date."+7 days"));
        
    }
}
