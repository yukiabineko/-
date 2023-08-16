<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 /******************注文レコード作成******************************************* */
   public function store(Request $request){
      if($request->session()->exists('cart')){
        foreach($request->count as $i=> $count ){
          Order::create([
            'path' => $request->path[$i],
            'name' => $request->name[$i],
            'price' => $request->price[$i],
            'count' => $count,
            'user_id' => \Auth::user()->id,
            'product_id' => $request->product_id[$i]
          ]);
        }
        $request->session()->forget('cart');
        return redirect(route('home'))->with('flash', '注文手続き完了しました。ありがとうございました。');
      }
   }
/******************お客様注文、問い合わせページ***************************************************/
  public function index(Request $request){
    $query = Order::query();

    if( !empty( $request->name )){
      $query->where('name', $request->name );
    }
    if( !empty( $request->price )){
      $query->where('price', $request->price );
    }
    if( !empty( $request->start_date )){
      $query->where('created_at', '>=', $request->start_date );
    }
    if( !empty( $request->finish_date )){
      $query
      ->where('created_at', '<=', date('Y-m-d', strtotime('+1 day',strtotime( $request->finish_date))) );
    }
    $orders = $query->where('user_id', \Auth::id())->paginate(20);
    return view('orders.index',[
       'orders' => $orders
    ]);
  }
}
