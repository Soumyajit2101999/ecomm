<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubCategoryController extends Controller
{
    function sub_category($id){
        $sub_category = DB::table('categories')->where('parent_id',$id)->get();
       
        return view('backend.sub_cat',['sub_cat'=>$sub_category,'id'=>$id]);
    }
    function add_sub_category( Request $request )
   {
   	$request->validate([
   		'sub_cat_name'=>'required',
   	]);

   	$data = array();
   	$data['category_name'] = $request->sub_cat_name;
   	$data['parent_id'] = $request->parent_id;
	$data['is_active'] = $request->is_active;
	   $insert = DB::table('categories')->insert( $data );

    	if( $insert )
		   return redirect()->back()->with('success','Your form has been sent sucessfully');
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
   }
   function sub_sub_category($id){
	$sub_sub_category = DB::table('categories')->where('parent_id',$id)->get();
   
	return view('backend.sub_sub',['sub_cat'=>$sub_sub_category,'id'=>$id]);
}
}
