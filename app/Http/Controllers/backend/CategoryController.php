<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    function category(Request $request){
        $category = DB::table('categories')->where('parent_id',0)->get();
        $request->session()->put('category',$category);
    return view('backend.category');
    }
    function add_category( Request $request )
   {
   	$request->validate([
   		'cat_name'=>'required',
   	]);

   	$data = array();
   	$data['category_name'] = $request->cat_name;
   	$data['parent_id'] = $request->parent_id;
	$data['is_active'] = $request->is_active;
	   $insert = DB::table('categories')->insert( $data );

    	if( $insert )
		   return redirect()->back()->with('success','Your form has been sent sucessfully');
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
   }

function cat_delete( $id ){
	$delete = DB::table('categories')->where( 'id', $id )->delete();

   	if( $delete )
		   return redirect()->back()->with('success','Deleted Successfully');
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
}

}
