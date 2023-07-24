<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
/**************************************** */
    /**
     * 商品登録ページ
     */
    public function create(){
        $product = new Product();
        return view('admin.product.create',[
            'product' => $product
        ]);
    }
/**************************************** */
    /**
     * 商品登録処理
     */
    public function store(ProductRequest $request){
        $files = $request->file('file');
        
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'area' => $request->area,
            'category' => $request->category,
            'info' => $request->info
        ]);
        if(!empty( $files)){
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $file->storeAs('/products/products'.$product->id, $fileName, 'public');
                $image = new Image();
                $image->create([
                    'path' => $fileName,
                    'product_id' =>$product->id
                ]);
            }
        }
        return redirect('/')->with('flash', '商品を登録しました。');
    }
/**************************************** */
    /**
     * 商品一覧ページ
     */
    public function index(Request $request){
        
        $product = Product::query();
        
        if( !empty( $request['name'] )){
            $product->where('name', $request['name'] );
        }
        if( !empty( $request['min-price'] )){
            $product->where('price', '>=', $request['min-price'] );
        }
        if( !empty( $request['max-price'] )){
            $product->where('price', '<=', $request['max-price'] );
        }
        if( !empty( $request['stock'] )){
            $product->where('stock', $request['stock'] );
        }
        if( !empty( $request['category'] )){
            $product->where('category', "=", $request['category'] );
        }
        

        $products = $product->orderBy('created_at', 'asc')->paginate(10);
        return view('admin.product.index',[
            'products' => $products
        ]);
    }
/**************************************** */
    /**
     * 編集ページ
     */
    public function edit(Product $product){
        return view('admin.product.edit', [
           'product' => $product
        ]);
    }
/**************************************** */
    /**
     * アップデート処理
     */
    public function update(ProductRequest $request, Product $product){
        $files = $request->file('file');
        $file_input_indexs = !(empty($files))? array_keys($files) : [];                                         //=>変更がかかっているinput[type="file"]の番号配列　
    

        $product->update([                                                                                      //=>ターゲット商品インスタンスのアップデート
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'area' => $request->area,
            'category' => $request->category,
            'info' => $request->info
        ]);

        $images = $product->images()->get();                                                                    //=>ターゲットの商品に紐付いているImageインスタンスリスト

        if(!empty( $files )){
            foreach ($file_input_indexs as $i) {
                $targetFile = $files[$i];
                $new_file_name = $targetFile->getClientOriginalName();
                $targetImage = $images[$i];                                                                     //=>編集対象のImageインスタンス
                $old_file_name = $targetImage->path;                                                            //=>変更下の画像ファイル
                $path = '/products/products' . $targetImage->product_id;                                        //=>画像のパス
                Storage::delete($path.'/',$old_file_name);                                                      //=>元のファイル削除
                $targetFile->storeAs( $path, $new_file_name, 'public');                                         //=>新規ファイル登録
                $targetImage->update([                                                                          //=>ターゲットImageインスタンス更新
                    'path' => $new_file_name
                ]);
            }
        }
        return redirect( route('admin.products'))->with('flash', '商品情報を更新しました。');
    }
/**************************************** */
   /**
    * 管理者番商品詳細
    */
    public function show(Product $product){
        return view('admin.product.show',[
          'product' => $product
        ]);
    }
/**************************************** */
   /**
    * 商品削除処理
    */
    public function destroy(Product $product){

        $images = $product->images()->get();
        Storage::deleteDirectory('public/products/products'.$images[0]->product_id);                                   //=>関連画像のディレクトリ削除
        foreach($images as $image){                                                                             //=>関連するImageインスタンス、画像も削除する。
          $image->delete();
        }
        $product->delete();                                                                                     //=>ターゲット商品の削除
        return redirect( route('admin.products'))->with('flash', '商品を削除しました。');
    }
}
