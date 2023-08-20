@extends('admin.app')

@section('title')
    お問い合わせ一覧
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/contacts/index.css')}}">
@endsection

@section('js')
  <script src="{{ asset('js/contacts/index.js')}}"></script>
@endsection

@section('contents')
   <div class="page-title">
      <h3>お問い合わせ一覧</h3>
   </div>

   <!-- メインコンテンツ -->
   <article class="main-contents">
      @include('share/contact-list')
   </article>


@endsection