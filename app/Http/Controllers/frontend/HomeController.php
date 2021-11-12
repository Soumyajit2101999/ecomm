<?php

namespace App\Http\Controllers\frontend;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
   
    public function home_view(Request $request){
        $slider = DB::table('slider')->orderBy('slider_id','desc')->get();
        
        

if(Session::has('gender'))
{

    $gender = Session::get('gender');
    if($gender == "Male"){
        $featured_product = DB::table('product')->leftJoin('groups','product.pro_gid','=','groups.group_id')->leftJoin('sub_category','groups.sub_id','=','sub_category.sub_id')->where('sub_category.sub_name','Men')->orWhere('sub_category.sub_name', 'Boys')->get();


    }
    elseif($gender == "Female"){
$featured_product = DB::table('product')->leftJoin('groups','product.pro_gid','=','groups.group_id')->leftJoin('sub_category','groups.sub_id','=','sub_category.sub_id')->where('sub_category.sub_name','Women')->orWhere('sub_category.sub_name', 'Girls')->get();
    }
    else{
        $featured_product = DB::table('product')->inRandomOrder()->get();
    }
}
else{
    $featured_product = DB::table('product')->inRandomOrder()->get();
}


$best_seller = DB::table('product')->leftJoin('best_seller','product.pro_id','=','best_seller.pro_id')->inRandomOrder()->get();

$blog = DB::table('blog')->orderBy('blog_id','desc')->get();
$new_arrivals = DB::table('product')->orderBy('pro_id','desc')->get();
$tags = DB::table('tags')->orderBy('tag_id','desc')->get();


$a = array();
 foreach($featured_product as $fea)
 {
     $a[] = $fea->pro_id;
    $_SESSION['featured_id'] = $a;
 }


 //Session::put('user_id',3);
//return print_r($_SESSION['cart']);


return view('frontend.index',['blog'=>$blog,'slider'=>$slider,'f_product'=>$featured_product]);
}

public function category_func(Request $request){
        $category = DB::table('categories')->where('parent_id',0)->get();

        


         

 $categories = array();
 $sub_cat = array();
foreach($category as $category){
    $categories[] = array(
        'id' => $category->id,
        'parent_id' => $category->parent_id,
        'category_name' => $category->category_name,
        'subcategory' => $this->sub_categories($category->id),
    );
    
}
foreach($categories as $cate){
    if( ! empty($cate['subcategory'])){
        $sub_cat[] = array(
            'category_name' => $this->viewsubcat($cate['subcategory']),
            'id' => $cate['id'],
    );
    } 
}

$new_product = DB::table('product')->orderBy('pro_id','desc')->get();
$address = DB::table('address')->where('user_id',1)->get();



      $request->session()->put('category',$categories);
      $request->session()->put('sub_category',$sub_cat);
      $request->session()->put('product',$new_product);
      $request->session()->put('address',$address);
	   return redirect()->back();
    }
    
    
    function sub_categories($id)
    {	
        
        $sql1 = DB::table('categories')->where('parent_id',$id)->get();
        
        $categories = array();
        
        foreach($sql1 as $sql1)
        {
            $categories[] = array(
                'id' => $sql1->id,
                'parent_id' => $sql1->parent_id,
                'category_name' => $sql1->category_name,
                'subcategory' => $this->sub_categories($sql1->id),
                'is_active' => $sql1->is_active,
            );
        }
        return $categories;
    }

    function viewsubcat($categories)
    {
        $html = '<ol class="link">';
        foreach($categories as $category){
    
            if($category['is_active'] == 1){
            $html .= '<li><a href = "">'.$category['category_name'].'</a></li>';
            }
            else{
                $html .= '<li ><b>'.$category['category_name'].'</b></li>';
            }
            if( ! empty($category['subcategory'])){
                $html .= $this->viewsubcat($category['subcategory']);
            }
        }
        $html .= '</ol>';
        
        return $html;
    }
    






}
