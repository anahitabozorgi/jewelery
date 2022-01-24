<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Http\Controllers\Api\apicontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function(){
    return "ok";
});
Route::prefix('product')->name('product.')->group(function(){
  Route::get('/',function(){
    $products = Product::all();
    return $products;
  });
  Route::get('/{id}',function($id){
    $product = Product::findOrFail($id);
    return $product;
  });
  Route::post('/update/{id}',function(Request $request,$id){
    $product = Product::findOrFail($id);
    if($request->hasFile('images')){
      $imageName = time().'.'.$request->file('images')->extension();
      $image1 ->move(public_path('images'),$imageName);
  }
    return $product->update($request->all());

  });
  Route::post('/store',function(Request $request){
    if($request->hasFile('images')){
      $imageName = time().'.'.$request->file('images')->extension();
      $image1 ->move(public_path('images'),$imageName);
  }
    Product::create($request->all());
  });
  Route::post('/delete/{id}',function($id){
    $product = Product::findOrFail($id);
    $product->delete();
  });

  // Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
  //       Route::view('/login','dashboard.user.login')->name('login');
  //       Route::view('/register','dashboard.user.register')->name('register');
  //       Route::post('/create',[UserController::class,'create'])->name('create');
  //       Route::post('/check',[UserController::class,'check'])->name('check');
  // });
});

Route::prefix('user')->name('user.')->group(function(){
  Route::get('/',function(){
    $user = User::all();
    return $user;
  });
  Route::get('/{id}',function($id){
    $user = User::findOrFail($id);
    return $user;
  });
  Route::post('/update/{id}',function(Request $request,$id){
    $user = User::findOrFail($id);
    return $user->update($request->all());

  });
  Route::post('/store',function(Request $request){

    User::create($request->all());
  });
  Route::post('/delete/{id}',function($id){
    $user = User::findOrFail($id);
    $user->delete();
  });


});

Route::prefix('admin')->name('admin.')->group(function(){
  Route::get('/home',function(){
    $products = Product::all();
    return view('dashboard.admin.home',compact('products'));
  });
  Route::get('/{id}',function($id){
    $admin = Admin::findOrFail($id);
    return $admin;
  });
  Route::post('/update/{id}',function(Request $request,$id){
    $admin = Admin::findOrFail($id);
    return $admin->update($request->all());

  });
  Route::post('/store',function(Request $request){

    Admin::create($request->all());
  });

  Route::get('/',function(){
    $admin = Admin::all();
    return $admin;
  });


});
Route::prefix('home')->group (function(){
  Route::get('/product',function(){
    $products = Product::all();
    return $products;
  });

});
// Route::get('/products',[ProductController::class, 'showProductsApi']);
Route::get('/users',[UserController::class,"showUsersApi"]);

//Route::get('product/show', [ProductController::class, 'showProductsApi'])->name('product.show');
// TODO: make a token for login
//Route::post('test', function(Request $request){
  //  $token = ["token" => "asd;kfjoqiawrwqeoirj123"];
 //   return $token;
//});

//Route::post('shaghayeghKharMibashad', function(Request $request){
  //  $token = ["token" => "asd;kfjoqiawrwqeoirj123"];
  //  return $request;
//});

Route::get('homepage', [ApiController::class, 'homepage']);
Route::post('addtocart',[ApiController::class, 'addtocart']);
