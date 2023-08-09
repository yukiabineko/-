@extends('app')
@section('title')
   店舗情報
@endsection
@section('css')
   <link rel="stylesheet" href="{{ asset('css/shops/index.css')}}">
@endsection

@section('contents')
   @include('share.flash')
   <div class="page-title">
     <h2>店舗情報</h2>
   </div>

   <article class="main-contents">
     <section class="images">
      <!-- メインイメージ -->
       <div class="main-image">
        <img src="{{ asset('image/contact/shop-main.jpg')}}" alt="メイン画像" class="main-img">
       </div>

      <!-- サブイメージ -->
      <div class="sub-images">
        <img src="{{ asset('image/contact/shop1.jpg')}}" alt="サブイメージ1" class="sub-img">
        <img src="{{ asset('image/contact/shop2.jpg')}}" alt="サブイメージ2" class="sub-img">
        <img src="{{ asset('image/contact/shop3.jpg')}}" alt="サブイメージ3" class="sub-img">
      </div>
     </section>

     <!-- 店舗情報テーブル -->
     <table class="shop-table">
       <tbody>
        <!-- 店舗名 -->
         <tr>
           <th>店舗名</th>
           <td>海鮮</td>
         </tr>

         <!-- 所在地 -->
         <tr>
          <th>店舗住所</th>
          <td>山梨県甲府市丸の内一丁目1-8</td>
         </tr>

         <!-- 電話番号 -->
         <tr>
          <th>電話番号</th>
          <td>090-0000-0000</td>
         </tr>

         <!-- 店舗責任者 -->
         <tr>
          <th>店舗責任者</th>
          <td>海鮮 太郎</td>
        </tr>
       </tbody>
     </table>
     <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.3831556977693!2d138.5648013972026!3d35.665938525104096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601bf9cdf7dd9361%3A0x4a1243024b4cb07a!2z55Sy5bqc6aeF!5e0!3m2!1sja!2sjp!4v1691486473445!5m2!1sja!2sjp"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
    
   </article>
@endsection