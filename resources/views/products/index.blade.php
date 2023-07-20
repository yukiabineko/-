@extends('app')
<!-- タイトル -->
@section('title')
    本日入荷商品
@endsection

<!-- css -->
@section('css')
  <link rel="stylesheet" href="{{ asset('css/products/daily.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
  <script src="{{ asset('js/top.js')}}"></script> 
@endsection

<!-- コンテンツ -->
@section('contents')
  
  <!-- コンテンツ -->
  <section class="daily-index-contents">
    <!-- 左サイド -->
    @include('left')

    <!-- 中央メイン -->
    <article class="daily-main">
      <!-- タイトル -->
      <div class="daily-title">
        <h3>オンライン販売商品</h3>
        <p>店頭で販売されている定番商品のオンラインショッピングはじめました。普段お買い上げ頂いている商品を直接店舗にご来店頂けなくても購入できる便利なサービスなのでこの機会にご利用くださいませ。</p>
      </div>
      @include('share.lists')
    </article>

     <!-- 右サイド -->
    @include('right')
   
  </section>
@endsection
