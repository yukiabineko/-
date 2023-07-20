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
        <h3>本日日替わり商品</h3>
        <p>毎朝、早朝鮮魚市場に足を運び、じっくりと選別し自信をもっておすすめするお魚をご用意いたしました。お魚を丸(無加工)の状態だけでなく、ご要望に応じて切り身、お刺身(柵状態まで),煮付け用、フライ用、塩焼き用など調理を無料でいたしますのでどうぞご利用くださいませ。</p>
      </div>

      @include('share.lists')
    </article>

     <!-- 右サイド -->
    @include('right')
   
  </section>
@endsection
