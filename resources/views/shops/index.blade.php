@extends('app')
@section('title')
   店舗情報
@endsection
@section('css')
   
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
      </div>


     </section>
   </article>
@endsection