@extends('app')
@section('title')
   お問合せ
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacts/create.css')}}">
@endsection

@section('contents')
   @include('share.flash')
   <div class="page-title">
     <h2>お問い合わせ</h2>
   </div>

   <article class="main-contents">
     <p class="info">
      必要な項目を入力してください。ログイン、会員未登録でもご利用いただけます。
      ログインしている場合はマイページにてお問合せ内容をご確認することができます。
     </p>
     <form action="{{ route('contacts.store')}}" method="post" class="contact-form">
      @csrf
      @include('share.errors')
      
      <!-- お名前 -->
      <div class="form-group">
        <div class="form-label">お名前(ニックネーム可)<span class="supplement">必須です</span></div>
        <input type="text" name="name" value="{{ old('name')? old('name') : Request::get('name') }}" class="form-control">
      </div>

      <!-- メールアドレス -->
      <div class="form-group">
        <div class="form-label">メールアドレス<span class="supplement">必須です</span></div>
        <input type="email" name="email" value="{{ old('name')? old('email') : Request::get('email') }}" class="form-control">
      </div>

      <!-- タイトル -->
      <div class="form-group">
        <div class="form-label">タイトル<span class="supplement">必須です</span></div>
        <input type="text" name="title" value="{{ old('title')}}" class="form-control">
      </div>

      <!-- 内容 -->
      <div class="form-group">
        <div class="form-label">質問内容<span class="supplement">必須です</span></div>
        <textarea name="context" class="form-control textarea" rows="4">{{ old('context')}}</textarea>
      </div>

      <input type="hidden" name="user_id", value="{{ Request::get('user_id')}}">

      <!-- 送信ボタン -->
      <div class="form-btn">
        <button type="submit" class="btn-submit">問い合わせる</button>
      </div>

     </form>
   </article>
@endsection