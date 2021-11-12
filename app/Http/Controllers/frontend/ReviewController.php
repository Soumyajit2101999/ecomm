<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class ReviewController extends Controller
{
    function post(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'rating'=>'required',
            'message'=>'required'
         ]);
 
         $user_id = Session::get('user_id');
         $pro_id = $request->pro_id;
         $reviews['reviews_name'] = $request->name;
         $reviews['reviews_email'] = $request->email;
         $reviews['reviews_rating'] = $request->rating;
         $reviews['reviews_message'] = $request->message;
         $reviews['user_id'] = $user_id;
         $reviews['pro_id'] = $pro_id;
         $save =  DB::table('review')->insert($reviews);
 
         if( $save )
            return back()->with('success','Review Submitted');
         else
            return back()->with('fail','Something Went Wrong');

    }
}
