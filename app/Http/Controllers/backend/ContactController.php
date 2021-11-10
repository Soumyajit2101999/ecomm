<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ContactController extends Controller
{
    public function contact() 
   {
	   $data=DB::table('contact')->orderBy('contact_id','desc')->get();
	   return view('backend.contact',['contact'=>$data]);
   }
   function contact_delete( $id )
   {
   	$delete = DB::table('contact')->where( 'contact_id', $id )->delete();

   	if( $delete )
		   return redirect()->route( 'backend.contact' )->with('success','Deleted Successfully');
		else
		   return redirect()->route( 'backend.contact' )->with('fail','Something Went Wrong');
   }
}
