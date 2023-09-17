<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;

class ProductController extends Controller
{
/****************************************************** */
    /**
     *商品詳細
     */
    public function show(Product $product){
        $before_action = explode( url(''), url()->previous())[1];
       
        return view('products.show',[
            'product'=> $product,
            'action' => $before_action
        ]);
    }
/***************************************************** */
   /**
    * オンライン版の商品一覧
    */
   public function index(Request $request){
    $query = Product::query();
    if(!empty( $request->category )){
        $query->where('category', "=", (int)$request->category );
    }
    elseif( !empty($request->name )){
        $query->where('name', "LIKE", "%". $request->name."%")->where('category', "!=", 10 );
    }
    else{
        $query->where('category', "!=", 10 ); 
    }
    $products = $query->get();
     return view('products.index',[
        'products' => $products
     ]);
   }
}
