<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubSubCategoryController extends Controller
{
    function sub_sub_category($id){
        $sub_sub_category = DB::table('categories')->where('parent_id',$id)->get();
       
        return view('backend.sub_sub',['sub_cat'=>$sub_sub_category,'id'=>$id]);
    }
    
}
