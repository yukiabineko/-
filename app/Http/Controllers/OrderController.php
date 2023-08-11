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
            'count' => $count,
            'user_id' => \Auth::user()->id,
            'product_id' => $request->product_id[$i]
          ]);
        }
        $request->session()->forget('cart');
        return redirect(route('home'))->with('flash', '注文手続き完了しました。ありがとうございました。');
      }
   }
}
