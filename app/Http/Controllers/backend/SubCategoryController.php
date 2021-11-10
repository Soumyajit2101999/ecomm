<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubCategoryController extends Controller
{
    function sub_category($id){
        $sub_category = DB::table('categories')->where('parent_id',$id)->get();
       
        return view('backend.sub_cat',['sub_cat'=>$sub_category]);
    }
}
