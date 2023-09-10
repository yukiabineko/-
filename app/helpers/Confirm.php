<?php
  namespace App\helpers;
  use Illuminate\Http\Request;

  /**
   * 商品確認オブジェクト化
   */
  class Confirm{
     public $count;
     public $path;
     public $name;
     public $price;
     public $product_id;

     public function __construct(array $array){
        $this->count = $array['count'];
        $this->path = $array['path'];
        $this->name = $array['name'];
        $this->price = $array['price'];
        $this->product_id = $array['product_id'];
     }
  }