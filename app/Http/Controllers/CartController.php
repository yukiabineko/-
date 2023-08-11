<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
/***************************************************** */
   /**
    * カートのセッション追加
    */
   public function store(Request $request){
      $request_data = [
        'path' => $request->path,
        'name' => $request->name,
        'price' => $request->price,
        'count' => $request->count,
        'max' => $request->max,
        'product_id' => $request->product_id
      ];

      if( session()->exists('cart')){
          
          $carts = session()->get('cart');
          if(!empty($request_data['name'])){
            array_push($carts, $request_data);
            session()->put('cart', $carts);
          }
      }
      else{
          $datas = [];
          array_push($datas, $request_data);
          session(['cart' => $datas]);
      }
     return redirect(route('cart.index'));
   }
/***************************************************** */
   /**
    * セッションの一覧
    */
    public function index(){
      if( session('cart')){
        return view('carts.index',[
          'carts' => session('cart')
        ]);
      }
      else{
        return redirect( route('home'));
      }
      
    }
/****************************************************** */
   /**
    * セッションの指定されたデータ削除
    */
    public function destroy(int $id){
       delete_cart($id);                                  #=>ヘルパー関数
    }
}
