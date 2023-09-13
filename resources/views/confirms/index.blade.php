@extends('app')
<!-- タイトル -->
@section('title')
    買い物かご
@endsection

<!-- css -->
@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirms/index.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
 
@endsection

<!-- コンテンツ -->
@section('contents')
  <!-- コンテンツ -->

  <section class="confirm-contents">
   <!-- タイトル -->
   <div class="confirm-title">
      <h3>注文最終確認ページ</h3>
   </div>

   <p class="info-title">まだ買い物が確定していません</p>
   
   <!-- メイン -->
      <!-- リスト -->
      <article class="confirm">
        @if (Agent::isMobile())
        @include('confirms/mobile-list')  
        @else
          @include('confirms/pc-list')
        @endif
      </article>
  </section>
@endsection
