@extends('app')
<!-- タイトル -->
@section('title')
    買い物かご
@endsection

<!-- css -->
@section('css')
  <link rel="stylesheet" href="{{ asset('css/carts/index.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
  <script src="{{ asset('js/cart/index.js')}}"></script>
@endsection

<!-- コンテンツ -->
@section('contents')
  <!-- コンテンツ -->

  <section class="cart-contents">
   <!-- タイトル -->
   <div class="cart-title">
      <h3>注文最終確定ページ</h3>
   </div>

   <p class="info-title">まだ買い物が確定していません</p>
   
   <!-- メイン -->
      <!-- リスト -->
      <article class="carts">
       
      </article>
  </section>
@endsection
