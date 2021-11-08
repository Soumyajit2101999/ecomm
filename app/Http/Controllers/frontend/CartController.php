<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class CartController extends Controller
{
    //
    function add(Request $request)
    {
       
        $product = DB::table('product')->where('pro_id',$request->id)->get()->first();
        $product_pin = $product->pin;

        $pin_explode = explode(",",$product_pin);

        foreach($pin_explode as $px)
        {
            if($px == Session::get('u')){
                if(Session::has('user_id')){
                    $user_id = Session::get('user_id');
                    $Query = DB::table('cart')->where('user_id',$user_id)->where('pro_id',$request->id)->count();
                    if($Query == 0){
                    $data = array();
                    $data['user_id'] = Session::get('user_id');
                    $data['pro_id'] = $request->id;
                    $data['pro_quan'] = $request->quan;
                    $query = DB::table('cart')->insert($data);
                    if($query){
                        $text = "Product Added to your cart";
                        break;
                    }
                    else{
                        $text = "Something went wrong";
                        break;
                    }
                }
                else{
                    $text = "This Product is already in your cart";
                        break;
                }
                }
                else{
                $_SESSION['cart'][$request->id]=array('quan'=>$request->quan);
                $text = "Product Added to your cart";
                break;
                }
            }
            else{
                $text = "This product is not available in your area.";
            }
        }
       return $text;
    }



    function view(){
        $pro = array();
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=>$value){
                $cart = DB::table('product')->where('pro_id',$key)->get()->first();
                $pro[] = array('cart'=>$cart,'key'=>$key,'value'=>$value['quan']);
            }
        }
        elseif(Session::has('user_id')){
            $userid = Session::get('user_id');
            $cart_pro = DB::table('cart')->where('user_id',$userid)->get();
            foreach($cart_pro as $cp){
                $pro_id = $cp->pro_id;
                $cart_product = DB::table('product')->where('pro_id',$pro_id)->get()->first();
                $pro[] = array('cart'=>$cart_product,'key'=>$pro_id,'value'=>$cp->pro_quan);
               
            }
        }
       
        //return print_r($pro);
        return view('frontend.cart',['product'=>$pro]);
    }

    function delete($id){
        if(Session::has('user_id')){
            $user = Session::get('user_id');
            $query_for_delete = DB::table('cart')->where('pro_id',$id)->where('user_id',$user)->delete();
        }
        else{
            unset($_SESSION['cart'][$id]);
            }
            return redirect()->back();
    }

    function update(Request $request){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=>$value){
                $pro_quan = $request->$key;
                $_SESSION['cart'][$key] = array('quan'=>$pro_quan);
            }
        }
        elseif(Session::has('user_id')){
            $users = Session::get('user_id');
            $data = array();

            $product_query = DB::table('cart')->where('user_id',$users)->get();

            foreach($product_query as $pq){
                $product_id = $pq->pro_id;
                $product_quan = $request->$product_id;
                $data['user_id'] = $users;
                $data['pro_id'] = $product_id;
                $data['pro_quan'] = $product_quan;
                $update_query = DB::table('cart')->where('user_id',$users)->where('pro_id',$product_id)->update($data);
            }
        }
        return redirect()->back();
    }
   
}
