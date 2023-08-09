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
        return view('products.show',[
            'product'=> $product
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
    else{
        $query->where('category', "!=", 10 ); 
    }
    $products = $query->get();
     return view('products.index',[
        'products' => $products
     ]);
   }
}
