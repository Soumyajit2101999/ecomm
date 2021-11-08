<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class ResetpasswordController extends Controller
{
    function forgot( Request $request )
	{
        //return $request->input();
       $request->validate([
           'password'=>'required',
           'password_confirmation'=>'required'
       ]);
       if($request->password==$request->password_confirmation){

       	$hashed = Hash::make($request->password_confirmation);

		$update = DB::table( 'users' )
					 ->where( 'id', 1 )
					 ->update( ['password'=>$hashed] );

		if( $update )
			return redirect()->route( 'backend.login' )->with( 'success', 'Successfully Updated' );


       }

       else{
       	 return redirect()->back()->with( 'fail', 'Confirmed Password Does Not Match' );
       }
    
	}
}
