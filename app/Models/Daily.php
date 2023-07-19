<?php

namespace App\Models;

use App\Models\Product;

class Daily extends Product{

  /**
   * 日替わり商品の一覧取得
   */
  public static function getDaily(){
     $parentInstance  = new Product();
     return $parentInstance->where('category', 0)->get();
  }

}