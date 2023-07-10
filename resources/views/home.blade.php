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
      
    </article>

     <!-- 右サイド -->
    @include('right')
   
  </section>
@endsection
