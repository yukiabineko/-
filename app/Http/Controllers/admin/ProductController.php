<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $product = new Product();
        return view('admin.product.create',[
            'product' => $product
        ]);
    }
}
