<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    function order_view(){
        $Query = DB::table('orders')->leftJoin('delivery','orders.order_id','=','delivery.order_id')->orderBy('orders.order_id','desc')->get();
       // return print_r($Query);
        return view('backend.orders',['details'=>$Query]);
    }
    function bill_view($id){
        $pro = array();
        $Query = DB::table('orders')->leftJoin('delivery','orders.order_id', '=', 'delivery.order_id')->leftJoin('order_product','orders.order_id','=','order_product.order_id')->where('orders.order_id',$id)->get();
        foreach($Query as $query){
            $product = $query->product_id;
            $product_query = DB::table('product')->where('pro_id',$product)->get()->first();
            $pro[] = array(
                "pro_name"=>$product_query->pro_name,
                "pro_quan"=>$query->product_quan,
                "pro_price"=>$product_query->pro_price
                                            );
        }
        return view('backend.bill',['details'=>$Query,'product'=>$pro]);
    }
}
