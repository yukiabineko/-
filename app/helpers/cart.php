<?php
if( !function_exists('tl_p')){
  function tl_p(array $array):int{
    $total = 0;
    foreach($array as $arr){
      if( gettype($arr) === "array" ){
        $total += floor( (int)$arr['price'] * 1.1 ) * (int)$arr['count'];
      }
      else{
        $total += floor( (int)$arr->price * 1.1 ) * (int)$arr->count;
      }
    }
    return $total;
  }
}

/**
 * 買い物かご削除処理
 */
if( !function_exists('delete_cart')){
  function delete_cart(int $id){
     $carts = session('cart');
     
     //指定した商品の削除
     unset($carts[$id]);
     session()->put('cart', $carts);


    $message = [
      'msg' => '削除しました',
      'id' => $id
    ];
    echo json_encode($message, JSON_UNESCAPED_UNICODE);
  }
}