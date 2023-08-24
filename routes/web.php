<?php

use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\shopController;
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
//お問合せ
Route::resource('contacts',ContactController::class)->only(['create', 'store']);
//店舗情報
Route::resource('shops',shopController::class)->only(['index']);

/******************************認証時のみok******************************************************************************************************* */
Route::group(['middleware' =>['auth']], function(){
  //管理者用ホーム
  Route::get('/admin',[AdminHomeController::class, 'index'])->name('admin.home');

  Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products_create');
  Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
  Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products_edit');
  Route::get('/admin/products/{product}', [AdminProductController::class, 'show'])->name('admin.products_show');
  Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products_store');
  Route::patch('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products_update');
  Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products_destroy');
  //管理者用問い合わせ一覧ページ
  Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('admin_contacts.index');
  Route::get('/admin/contacts/{id}',[AdminContactController::class, 'show'])->name('admin_contacts.show');
  Route::post('/admin/contact/replay',[AdminContactController::class, 'replay'])->name('admin_contact.replay');

  //カート関連
  Route::resource('/cart', CartController::class)->only(['store','index']);
  Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.destroy');
  //注文状況
  Route::resource('orders',OrderController::class)->only(['store']);
  Route::get('/orders',[OrderController::class, 'index'])->name('orders.index');
  //問い合わせ関連(ログイン時のみ)
  Route::resource('contacts',ContactController::class)->only(['index']);


  //お客様関連
  Route::resource('/admin/users', AdminUserController::class,['names'=>['index' => 'admin.users.index']])->only(['index']);
  Route::resource('/users', UserCotroller::class)->only(['edit','update','show']);
});
