<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 商品登録ページ
     */
    public function create(){
        $product = new Product();
        return view('admin.product.create',[
            'product' => $product
        ]);
    }
    /**
     * 商品登録処理
     */
    public function store(ProductRequest $request){
        $files = $request->file('file');
        
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'info' => $request->info
        ]);
        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $file->storeAs('products'.$product->id, $fileName, 'public');
        }
        return redirect('/')->with('flash', '商品を登録しました。');
    }
    /**
     * 商品一覧ページ
     */
    public function index(){
        return view('admin.product.index');
    }
}
