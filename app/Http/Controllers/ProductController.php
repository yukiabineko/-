<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
   public function index(){
     $products = Product::where('category', '!=', 0)->get();
     return view('products.index',[
        'products' => $products
     ]);
   }
}
