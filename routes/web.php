<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ResetpasswordController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\MyOrderController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\WishListController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\CouponController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/frontend/index/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'category'], function () {
Route::get('/frontend/register',[AuthController::class,'register'])->name('frontend.register');
Route::get('/frontend/login',[AuthController::class,'login'])->name('frontend.login');
Route::post('/frontend/save',[AuthController::class,'save'])->name('frontend.save');
Route::post('/frontend/check',[AuthController::class,'check'])->name('frontend.check');
Route::get('/frontend/logout',[AuthController::class,'logout'])->name('frontend.logout');
Route::get('/frontend/contact',[ContactController::class,'contact_view'])->name('frontend.contact');
Route::post('/frontend/contact_post',[ContactController::class,'contact_post'])->name('frontend.contact_post');
Route::get('/',[HomeController::class,'home_view'])->name('frontend.index');
Route::get('frontend/product_detail/{id}',[ProductController::class,'product_detail'])->name('frontend.product_detail');
Route::post('frontend/add_pin',[ProductController::class,'add_pin_checker'])->name('frontend.add_pin');
Route::post('frontend/pin_check',[ProductController::class,'pin_check'])->name('frontend.pin_check');
Route::post('frontend/add_to_cart',[CartController::class,'add'])->name('frontend.add_to_cart');
Route::get('frontend/cart',[CartController::class,'view'])->name('frontend.cart');
Route::get('frontend/delete_item/{id}',[CartController::class,'delete'])->name('frontend.delete_item');
Route::post('frontend/update_cart',[CartController::class,'update'])->name('frontend.update_cart');
Route::post('frontend/add_to_wishlist',[WishListController::class,'add'])->name('frontend.add_to_wishlist');
Route::post('frontend/coupon',[CouponController::class,'apply'])->name('frontend.coupon');
Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('frontend/checkout',[CheckoutController::class,'view'])->name('frontend.checkout');
    Route::post('frontend/order_process',[CheckoutController::class,'process'])->name('frontend.order_process');
    Route::get('frontend/my_order',[MyOrderController::class,'myorder_view'])->name('frontend.my_order');
    Route::get('frontend/bill/{id}',[MyOrderController::class,'bill_view'])->name('frontend.bill');
    Route::get('frontend/wishlist',[WishListController::class,'view_wishlist'])->name('frontend.wishlist');
    Route::get('frontend/wishlist_delete/{id}',[WishListController::class,'delete'])->name('frontend.wishlist_delete');
    Route::post('frontend/review_post',[ReviewController::class,'post'])->name('frontend.review_post');
});
});
Route::get('/cat',[HomeController::class,'category_func'])->name('cat');






//ADMIN PANEL

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

   
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    
    Route::get('/master',[App\Http\Controllers\backend\MasterController::class,'master'])->name('backend.master');

    Route::get('/backend/category',[App\Http\Controllers\backend\CategoryController::class,'category'])->name('backend.category');

    Route::post('backend/category_post',[App\Http\Controllers\backend\CategoryController::class,'add_category'])->name('backend.category_post');

    Route::get('/backend/category_delete/{id}',[App\Http\Controllers\backend\CategoryController::class,'cat_delete'])->name('backend.category_delete');

    Route::get('/backend/sub_cat/{id}',[App\Http\Controllers\backend\SubCategoryController::class,'sub_category'])->name('backend.sub_cat');

    Route::post('backend/sub_category_post',[App\Http\Controllers\backend\SubCategoryController::class,'add_sub_category'])->name('backend.sub_category_post');

    Route::get('/backend/sub_sub/{id}',[App\Http\Controllers\backend\SubCategoryController::class,'sub_sub_category'])->name('backend.sub_sub');

    Route::get('/backend/product/{id}',[App\Http\Controllers\backend\ProductController::class,'product_view'])->name('backend.product');

    Route::get('/backend/add_product/{id}',[App\Http\Controllers\backend\ProductController::class,'add_product_view'])->name('backend.add_product');

    Route::post('/backend/add_product_post',[App\Http\Controllers\backend\ProductController::class,'add_product_post'])->name('backend.add_product_post');

    Route::get('/backend/edit_product/{id}',[App\Http\Controllers\backend\ProductController::class,'edit_product_view'])->name('backend.edit_product');

    Route::post('/backend/edit_product_post',[App\Http\Controllers\backend\ProductController::class,'edit_product_post'])->name('backend.edit_product_post');

    Route::get('/backend/delete_product/{id}',[App\Http\Controllers\backend\ProductController::class,'delete_product'])->name('backend.delete_product');

    Route::get('/backend/coupon',[App\Http\Controllers\backend\CouponController::class,'coupon_view'])->name('backend.coupon');

    Route::post('/backend/coupon_post',[App\Http\Controllers\backend\CouponController::class,'post'])->name('backend.coupon_post');

    //Contact
    Route::get('/backend/contact',[App\Http\Controllers\backend\ContactController::class,'contact'])->name('backend.contact');
    Route::get('/backend/contact_delete/{id}',[App\Http\Controllers\backend\ContactController::class,'contact_delete'])->name('backend.contact_delete');

//Order
    Route::get('/backend/orders',[App\Http\Controllers\backend\OrderController::class,'order_view'])->name('backend.orders');
//Bill
Route::get('backend/bill/{id}',[App\Http\Controllers\backend\OrderController::class,'bill_view'])->name('backend.bill');


    });
    Route::get('/backend/login',function(){
        return view('backend.login');
    })->name('backend.login');
    Route::get('/backend/forgot-password',function(){
        return view('backend.forgot-password');
    })->name('forgot');
    Route::get('backend/reset-password',function(){
        return view('backend.reset-password');
    })->name('reset_password');
    Route::post( '/backend/reset-password', [ResetpasswordController::class, 'forgot'] )->name( 'backend.forgot-password' );