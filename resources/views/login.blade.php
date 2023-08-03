@extends('app')
@section('title')
   ログイン
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form.css')}}">
@endsection

@section('contents')
   <div class="page-title">
     <h2>ログイン</h2>
   </div>

   <article class="main-contents">
      <!-- エラー表示 -->
      @include('share.errors')
      
      <form action="{{ route('login')}}" class="form new-user" method="POST">
        @csrf
        
         <!-- メールアドレス -->
         <div class="form-group">
            <div class="form-title">メールアドレス</div>
            <input type="email" name="email" class="form-control" value="{{old('email')}}">
         </div>

          <!-- パスワード -->
          <div class="form-group">
            <div class="form-title">パスワード</div>
            <input type="password" name="password" class="form-control">
         </div>


          <!-- ボタン -->
          <div class="form-button">
            <input type="submit" value="ログイン" class="btn submit">
            <a href="{{ route('register')}}" class="btn link">新規登録へ</a>
         </div>
         
         <!-- パスワードリセット -->
         <div class="password-reset">
            <a href="{{ route('password.request')}}">パスワードを忘れた場合はこちら</a>
         </div>
      </form>
      
   </article>
@endsection