@extends('admin.app')

@section('title')
    お客様一覧
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('css/admin/users/index.css')}}">
@endsection

@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
      <h3>お客様一覧</h3>
   </div>
   @include('share.flash')

   <!-- メインコンテンツ -->
   <article class="main-contents">
      {{ $users->links() }}
    @include('admin/users/pc-table')
    @include('admin/users/mobile-table')
   </article>


@endsection