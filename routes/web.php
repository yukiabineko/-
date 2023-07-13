<?php

use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/admin/products/create',[AdminProductController::class, 'create'])->name('admin.products_create');
Route::post('/admin/products',[AdminProductController::class, 'store'])->name('admin.products_store');

Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::group(['middleware' =>['auth']], function(){
   
});
