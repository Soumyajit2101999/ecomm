<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    function category(Request $request){
        $category = DB::table('category')->get();
        $request->session()->put('category',$category);
    return view('backend.category');
    }
    function faq_post( Request $request )
   {
   	$request->validate([
   		'ques'=>'required',
   		'ans'=>'required'
   	]);

   	$data = array();
   	$data['faq_ques'] = $request->ques;
   	$data['faq_ans'] = $request->ans;
	   $insert = DB::table('faq')->insert( $data );

    	if( $insert )
		   return redirect()->route( 'backend.faq' )->with('success','Your form has been sent sucessfully');
		else
		   return redirect()->route( 'backend.faq' )->with('fail','Something Went Wrong');
   }
}
