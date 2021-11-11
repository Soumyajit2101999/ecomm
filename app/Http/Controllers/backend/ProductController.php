<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    function product_view( $id ){
        $product = DB::table('product')->where('pro_gid',$id)->get();
        return view('backend.product',['product'=>$product,'id'=>$id]);
    }
    function add_product_view($id){
        return view('backend.add_product',['id'=>$id]);
    }

    function add_product_post(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'available'=>'required',
            'description'=>'required'
        ]);
        $gid = $request->gid;

        $data = array();
   	    $data['pro_name'] = $request->name;

           if($request->hasfile('pro_image')){
            $file = $request->file('pro_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $data['pro_image'] = $filename;
         }

         $images=array();
         if($files=$request->file('pro_other_image')){
             foreach($files as $file){
                 $name=$file->getClientOriginalName();
                 $file->move('image',$name);
                 $images[]=$name;
             }
             foreach($images as $ot_image)
             {
                 $img = array();
                 //$img['pro_id']
             }
         }

         return print_r($images);
         $data['pro_price'] = $request->price;
         $data['pro_disc'] = $request->discount;
         $data['pro_gid'] = $gid;
         $data['pro_description'] = $request->description;
         $data['pro_available'] = $request->available;
         $data['pin'] = $request->pin;
        
	    $insert = DB::table('product')->insert( $data );

    	if( $insert )
		   return redirect()->back()->with('success','Your form has been sent sucessfully');
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
    }
}
