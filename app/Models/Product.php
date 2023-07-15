<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   const STATAS = [
      '日替わり商品',
      '干物',
      'うなぎ'
   ];
    use HasFactory;
    protected $fillable = ["name", "price", "stock", "category", "info"];

    /**
     * リレーション関連
     */
    public function images(){
       return $this->hasMany(Image::class);
    }
    /**
     * 関連画像の最初の画像取得(サムネイル化)
     */
    public function thumbnail(){
       $first_image = $this->images()->get();
      return count( $first_image ) >0 ? $first_image[0]->path : null;
       
    }
    /**
     * カテゴリー名取得
     */
    public function getCategory(){
      return self::STATAS[ (int) $this->category ];
    }
   
}
