<?php
if( !function_exists('tl_p')){
  function tl_p(array $array):int{
    $total = 0;
    foreach($array as $arr){
      $total += floor( (int)$arr['price'] * 1.1 ) * (int)$arr['count'];
    }
    return $total;
  }

}