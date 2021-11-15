<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
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
            'order_zip'=>'required',
            'optradio'=>'required'
        ]);



        if(Session::get('u') == $request->order_zip){

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
        $order_unique_id = Session::get('user_id').$p_orderid.rand(100,1000);

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
            $delivery['zip'] = $request->order_zip;
            $delivery['phone'] =   $request->order_phone;

            $delivery_insert = DB::table('delivery')->insert($delivery);


            if(!$delivery_insert){

            }
            else{
                $cart_query = DB::table('cart')->where('user_id',Session::get('user_id'))->get();

                foreach($cart_query as $cq){
                    $key = $cq->pro_id;
                    $cart = DB::table('product')->where('pro_id',$key)->get()->first();
                    $product_price = $cart->pro_price;
                    $product_quan = $cq->pro_quan;


                    $order_product = array();
                    $order_product['product_id'] = $key;
                    $order_product['order_id'] = $order_id;
                    $order_product['product_price'] = $product_price;
                    $order_product['product_quan'] = $product_quan;

                    $order_insert = DB::table('order_product')->insert($order_product);


                }
                if($request->optradio == 'online'){
                    $transact_id = $order_unique_id.rand(100,1000);
                    $payment = array();
                    $payment['transaction_id'] = $transact_id;
                    $payment['order_id'] = $order_id;
                    $payment['merchant_name'] = "ABCDEFGHIJ";

                    $payment_insert = DB::table('user_payment')->insert($payment);
                }
            }
            if(Session::has('user_id')){
                $users = Session::get('user_id');
                $delete = DB::table('cart')->where('user_id',$users)->delete();
            }
            $mail = [
                'title' => 'Ecommerce',
                'body' => 'Thanks for placing Order.',
   
            ];
            
             Mail::to(Session::get('email'))->send(new testmail($mail));
            unset($_SESSION['subtotal']);
            unset($_SESSION['total']);
            unset($_SESSION['grand_total']);

        }
        return redirect()->route('frontend.my_order');
    }
    else{
        if(Session::has('user_id')){
            $users = Session::get('user_id');
            $delete = DB::table('cart')->where('user_id',$users)->delete();
        }
        unset($_SESSION['subtotal']);
        unset($_SESSION['total']);
        unset($_SESSION['grand_total']);
        return redirect()->back()->with('fail',"You cannot proceed to checkout. Your given pin code does not match.");
    }


    }
}
