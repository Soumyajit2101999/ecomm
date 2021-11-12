<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class WishListController extends Controller
{
    function add(Request $request){
        if(Session::has('user_id')){
            $user_id = Session::get('user_id');
            $Query = DB::table('wishlist')->where('user_id',$user_id)->where('pro_id',$request->id)->count();
            if($Query == 0){
            $data = array();
            $data['user_id'] = Session::get('user_id');
            $data['pro_id'] = $request->id;
            $query = DB::table('wishlist')->insert($data);
            if($query){
                $text = "Product Added to your wishlist";
                
            }
            else{
                $text = "Something went wrong";
                
            }
        }
        else{
            $text = "This Product is already in your wishlist";
                
        }
        }
        else{
            $text = "Please login";
        }
        return $text;
    }
    function view_wishlist(){
        if(Session::has('user_id')){
            $user = Session::get('user_id');
            $wish = DB::table('wishlist')->leftJoin('product','product.pro_id','=','wishlist.pro_id')->where('wishlist.user_id',$user)->get();
        }
        return view('frontend.wishlist',['wish'=>$wish]);
    }

    function delete($id){
        $users = Session::get('user_id');
        $delete = DB::table('wishlist')->where('user_id',$users)->where('pro_id',$id)->delete();
        return redirect()->back()->with('success',"Deleted Successfuly");
    }
}
