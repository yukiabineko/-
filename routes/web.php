<?php

use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCotroller;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[HomeController::class, 'home'])->name('home');
Route::resource('/products',ProductController::class);
 //日替わり生鮮
Route::resource('daily', DailyController::class)->only(['index']);
Route::group(['middleware' =>['auth']], function(){
  Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products_create');
  Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
  Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products_edit');
  Route::get('/admin/products/{product}', [AdminProductController::class, 'show'])->name('admin.products_show');
  Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products_store');
  Route::patch('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products_update');
  Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products_destroy');
  //カート関連
  Route::resource('/cart', CartController::class)->only(['store','index']);
  Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.destroy');
  //お客様関連
  Route::resource('/admin/users', AdminUserController::class,['names'=>['index' => 'admin.users.index']])->only(['index']);
  Route::resource('/users', UserCotroller::class)->only(['edit','update']);
});
