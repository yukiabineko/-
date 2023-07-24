<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   const STATAS = [
      '日替わり商品',
      '塩鮭',
      '干物',
      '魚卵',
      '丸干し',
      '珍味',
      'ちりめん',
      'うなぎ'
   ];
    use HasFactory;
    protected $fillable = ["name", "price", "stock", "area", "category", "info", "quantity"];

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
     * 関連画像の最初の画像フルパス取得
     */
    public function thumbnailFullPath(){
      $fileName = $this->thumbnail();
      return $fileName? 'products/products'.$this->id.'/'.$fileName : 'image/noimage.png';
    }
    /**
     * カテゴリー名取得
     */
    public function getCategory(){
      return self::STATAS[$this->category !=10? (int) $this->category : 0 ];
    }
    /**
     * 消費税の計算
     */
    public function tax(){
      return floor( (int)$this->price * 1.1 );
    }
   
}
