<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
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
            'order_city'=>'required',
            'order_phone'=>'required',
            'optradio'=>'required'
        ]);

        date_default_timezone_set("Asia/Kolkata");
        $order_date = date("Y-m-d h:i:sa");
        $Order_date = date("Y-m-d");
        $payment_status = "Pending";
        date_default_timezone_set("Asia/Kolkata");
        $delivery_date = date("Y-m-d",strtotime($Order_date."+7 days"));

        $count = DB::table('orders')->where('user_id',Session::get('user_id'))->orderBy('order_id')->count();
        if($count == 0){
            $p_orderid = 0;
        }
        else{
            $query = DB::table('orders')->where('user_id',Session::get('user_id'))->orderBy('order_id')->get()->first();
            $p_orderid = $query->order_id;
        
        }
        $order_unique_id = $user_id.$p_orderid.rand(100,1000);

        $order = array();
        $order['user_id'] = Session::get('user_id');
        $order['total_price'] = $_SESSION['total'];
        $order['discount'] = 42;
        $order['tax'] = 50;
        $order['delivery_charge'] = 10;
        $order['payment_method'] = $request->optradio;
        $order['payment_status'] = $payment_status;
        $order['order_unique_id'] = $order_unique_id;
        $order['order_date'] = $order_date;
        $order['delivery_status'] = 'Pending';
        $order['delivery_date'] = $delivery_date;

        $insert = DB::table('orders')->insert($order);

        if(!$insert){

        }
        else{
            $order_select = DB::table('orders')->where('order_unique_id',$order_unique_id)->get()->first();
            $order_id = $order_select->order_id;

            $delivery = array();
            $delivery['order_id'] = $order_id;
            $delivery['name'] = $request->order_fname;
            $delivery['state'] = $request->order_state;
            $delivery['address'] = $request->order_address;
            $delivery['city'] = $request->order_city;
            $delivery['phone'] =   $request->order_phone;

            $delivery_insert = DB::table('delivery')->insert($delivery);


            if(!$delivery_insert){

            }
            else{
                $cart_query = DB::table('cart')->where('user_id',Session::get('user_id'))->get();

                foreach($cart_query as $cq){
                    $key = $cq->pro_id;
                    $cart = DB::table('product')->where('pro_id',$key)->get()->first();

                }
            }
        }

    }
}
