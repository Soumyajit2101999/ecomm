<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class MyOrderController extends Controller
{
    function myorder_view(){
        $user_id = Session::get('user_id');
        $Query = DB::table('orders')->leftJoin('delivery','orders.order_id', '=', 'delivery.order_id')->where('orders.user_id',$user_id)->orderBy('orders.order_id','desc')->get();
        return view('frontend.my_order',['order'=>$Query]);
    }
    function bill_view($id){
        $pro = array();
        $Query = DB::table('orders')->leftJoin('delivery','orders.order_id', '=', 'delivery.order_id')->leftJoin('order_product','orders.order_id','=','order_product.order_id')->where('orders.order_id',$id)->get();
        foreach($Query as $query){
            $product = $query->product_id;
            $product_query = DB::table('product')->where('pro_id',$product)->get()->first();
            $pro[] = $product_query;
        }
        return view('frontend.bill',['details'=>$Query,'product'=>$pro]);
    }
}
