@extends('app')
<!-- タイトル -->
@section('title')
    トップページ
@endsection

<!-- css -->
@section('css')
    <link rel="stylesheet" href="{{ asset('css/top.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
  <script src="{{ asset('js/top.js')}}"></script> 
@endsection

<!-- コンテンツ -->
@section('contents')
  <!-- メインビジュアル -->
  <section  class="main-visual">
    <div class="main-visual-wrapper">
      <img src="{{ asset('image/home/main-visual1.png')}}" alt="メインビジュアル1" class="mv-img">
      <img src="{{ asset('image/home/main-visual2.png')}}" alt="メインビジュアル2" class="mv-img">
      <img src="{{ asset('image/home/main-visual3.png')}}" alt="メインビジュアル3" class="mv-img">
    </div>
  </section>
  <!-- コンテンツ -->
  <section class="top-contents">
    <!-- 左サイド -->
    @include('left')

    <!-- 中央メイン -->
    <article class="top-main">

      <!-- 店舗案内 -->
      <section class="shop-info">
        <h2>海鮮について</h2>
        <div class="info-images">
          <img src="{{ asset('image/home/top-item1.jpg')}}" alt="画像1">
          <img src="{{ asset('image/home/top-item2.jpg')}}" alt="画像2">
          <img src="{{ asset('image/home/top-item3.jpg')}}" alt="画像3">
        </div>
        <p class="info-text">
          海鮮は山梨県で日々新鮮な魚介類をお届けするお魚屋さんです。長年様々なお魚を見てきた確かな目利きで、毎朝市場に足を運び納得がいく鮮度の抜群の商品のみを仕入れてお客様に納得していただける商品を販売することを心掛けているお魚屋さんです。
        </p>
      </section>

      <!-- 店舗サービス -->
      <section class="shop-service">
        
      </section>



    </article>

     <!-- 右サイド -->
    @include('right')
   
  </section>
@endsection
