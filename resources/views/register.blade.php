@extends('app')
@section('title')
   新規お客様登録 
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form.css')}}">
@endsection

@section('context')
   <div class="page-title">
     <h2>新規会員登録</h2>
   </div>
   <article class="main-contents">
      <form action="{{ route('register')}}" class="form new-user" enctype="multipart/form-data">
        @csrf
        <!-- 画像 -->
        <div class="form-group">
           <div class="form-title">プロフィール写真</div>
           <div class="files">
            <input type="file" name="file" id="file">
           </div>
        </div>

         <!-- 名前 -->
         <div class="form-group">
            <div class="form-title">お客様名<span class="form-attention">(*必須です。)</span></div>
            <input type="name" name="name" class="form-control" value="{{old('name')}}">
         </div>

         <!-- メールアドレス -->
         <div class="form-group">
            <div class="form-title">メールアドレス<span class="form-attention">(*必須です。)</span></div>
            <input type="email" name="email" class="form-control" value="{{old('email')}}">
         </div>

          <!-- パスワード -->
          <div class="form-group">
            <div class="form-title">パスワード<span class="form-attention">(*必須です。)</span></div>
            <input type="password" name="password" class="form-control">
         </div>

          <!-- パスワード確認 -->
          <div class="form-group">
            <div class="form-title">パスワード確認<span class="form-attention">(*必須です。)</span></div>
            <input type="password" name="password_confirmation" class="form-control">
         </div>

          <!-- パスワード -->
          <div class="form-button">
            <input type="submit" value="登録">
         </div>


      </form>
   </article>
@endsection