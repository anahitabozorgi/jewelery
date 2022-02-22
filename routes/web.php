<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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


Route::get('/',[ProductController::class,'index1'])->name('home1');
Route::get('/show/{id}', [ProductController::class, 'show2'])->name('product.show');
Route::get('/ring', [ProductController::class, 'ring'])->name('ring');
Route::get('/bracelet', [ProductController::class, 'bracelet'])->name('bracelet');
Route::get('/earing', [ProductController::class, 'earing'])->name('earing');
Route::get('/necklaces', [ProductController::class, 'necklaces'])->name('necklaces');
Route::get('/search', [ProductController::class,'search'])->name('search');

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::get('/ring', [ProductController::class, 'ring1'])->name('ring');
        Route::get('/bracelet', [ProductController::class, 'bracelet1'])->name('bracelet');
        Route::get('/earing', [ProductController::class, 'earing1'])->name('earing');
        Route::get('/necklaces', [ProductController::class, 'necklaces1'])->name('necklaces');
        Route::get('/search', [ProductController::class,'search'])->name('search');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/profile','dashboard.user.edit')->name('profile');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/home',[ProductController::class,'index2'])->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        Route::post('/update',[UserController::class,'update'])->name('update');
        Route::post('/cart/{id}', [CartController::class, 'cart'])->name('product.cart');
        Route::get('/cart',[CartController::class, 'cartshow'])->name('product.cartshow');
        Route::post('/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::post('/order', [CartController::class, 'order'])->name('order');
        Route::get('/search', [ProductController::class,'usersearch'])->name('search');

   

    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/show/{id}', [ProductController::class, 'show1'])->name('product.show');
        Route::get('/home',[ProductController::class,'index'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/create',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('/update',[ProductController::class,'update'])->name('update');
        Route::post('/delete/{id}',[ProductController::class,'destroy'])->name('destroy');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/add',[AdminController::class,'create'])->name('add');
        Route::get('/ring', [ProductController::class, 'ringa'])->name('ring');
        Route::get('/bracelet', [ProductController::class, 'braceleta'])->name('bracelet');
        Route::get('/earing', [ProductController::class, 'earinga'])->name('earing');
        Route::get('/necklaces', [ProductController::class, 'necklacesa'])->name('necklaces');
        
    });
});

