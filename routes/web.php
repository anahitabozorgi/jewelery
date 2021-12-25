<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/profile','dashboard.user.edit')->name('profile');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/home',[ProductController::class,'index2'])->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        Route::post('/update',[UserController::class,'update'])->name('update');
   

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
    });
});

