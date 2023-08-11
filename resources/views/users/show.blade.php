@extends('app')
@section('title')
   {{ $user->surname}} {{$user->name}}さん編集
@endsection
@section('css')
   
@endsection
@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
     <h2>会員様詳細ページ</h2>
   </div>

   <article class="main-contents">
      <div class="user-name">
        <img src="{{ asset('storage/users'.$user->id.'/'.$user->path)}}" alt="{{ $user->path }}">
        <div class="name-info">
          <div class="name">{{ $user->surname }} {{ $user->name}}様</div>
        </div>
      </div>
      <table class="user-table">

      </table>
   </article>
@endsection