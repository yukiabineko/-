<?php

namespace App\Http\Controllers;

use App\helpers\Confirm;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    /**
     * 最終確認ページ
     */
    public function index(Request $request){
        $carts = [];
        for($i = 0; $i< count( $request->count); $i++ ){
           $confirm = new Confirm(
             [
               'count' => $request->count[$i],
               'path' => $request->path[$i],
               'name' => $request->name[$i],
               'price' => $request->price[$i],
               'product_id' => $request->product_id[$i]
             ]
           );
         array_push($carts, $confirm);
        }
      return view('confirms.index',[
        'carts' => $carts
      ]);
    }
}
