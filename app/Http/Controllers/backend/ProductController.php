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
         //return print_r($images);
         $data['pro_price'] = $request->price;
         $data['pro_disc'] = $request->discount;
         $data['pro_gid'] = $gid;
         $data['pro_description'] = $request->description;
         $data['pro_available'] = $request->available;
         $data['pin'] = $request->pin;
        
	    $insert = DB::table('product')->insert( $data );

    	if( $insert ){

            $product_id = DB::table('product')->orderBy('pro_id','desc')->get()->first();
            $images=array();
            if($files=$request->file('pro_other_image')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('backend/images/',$name);
                    $images[]=$name;
                }
                foreach($images as $ot_image)
                {
                    $img = array();
                    $img['pro_id'] =$product_id->pro_id;
                    $img['pro_image'] = $ot_image;
                    $image_insert = DB::table('product_image')->insert($img);
                }
            }

           return redirect()->back()->with('success','Your form has been sent sucessfully');
        }
		else
		   return redirect()->back()->with('fail','Something Went Wrong');
    }

    function edit_product_view($id){
        $edit_product = DB::table('product')->where('pro_id',$id)->get()->first();
        return view('backend.edit_product',['pro'=>$edit_product]);
    }
    function edit_product_post( Request $request )
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
     $data['pro_price'] = $request->price;
     $data['pro_disc'] = $request->discount;
     $data['pro_gid'] = $gid;
     $data['pro_description'] = $request->description;
     $data['pro_available'] = $request->available;
     $data['pin'] = $request->pin;

        $query = DB::table('product')->where( 'pro_id', $request->id )->update($data);
        return redirect()->route( 'backend.product',$gid )->with('success','updated successfuly');
    }

    function delete_product( $id )
    {
        $pro=DB::table('product')->where( 'pro_id', $id )->get()->first();
        $image = $pro->pro_image;
        if(file_exists(public_path( 'backend/images/'.$image )))
            unlink( public_path( 'backend/images/'.$image ) );

        $query = DB::table('product')->where( 'pro_id', $id )->delete();
        return redirect()->back()->with('success','Succesfully deleted');
    }

}
