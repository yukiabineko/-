@extends('app')
@section('title')
   新規お客様登録 
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form.css')}}">
@endsection
@section('js')
    <script src="{{ asset('js/register.js')}}"></script>
@endsection

@section('contents')
   <!-- エラー表示 -->
   @include('share.errors')
   
   <div class="page-title">
     <h2>新規会員登録</h2>
   </div>

   <article class="main-contents">
      <form action="{{ route('register')}}" class="form new-user" enctype="multipart/form-data" method="POST">
        @csrf
        <!-- 画像 -->
        <div class="form-group file-group">
           <div class="form-title">プロフィール写真</div>
           <div class="files">
            <span class="file-text"></span>
            <label for="file" class="file-label">ファイル選択</label>
            <input type="file" name="file" id="file" accept="image/*">
           </div>
        </div>

         <!-- 名前 -->
         <div class="form-group">
            <div class="form-title">お客様名<span class="form-attention">(*必須です。)</span></div>
            <div class="name-wrapper">
               <!-- 氏 -->
               <div class="name-form">
                  <span class="surname">氏</span>
                  <input type="text" name="surname" class="form-control" value="{{old('surname')}}">
               </div>
               <!-- 名 -->
               <div class="name-form">
                  <span class="surname">名</span>
                  <input type="text" name="name" class="form-control" value="{{old('name')}}">
               </div>
            </div>
         </div>

          <!-- 名前(カナ) -->
          <div class="form-group">
            <div class="form-title">お客様名(フリガナ)<span class="form-attention">(*必須です。)</span></div>
            <div class="name-wrapper">
               <!-- 氏 -->
               <div class="name-form">
                  <span class="surname">氏(フリガナ)</span>
                  <input type="text" name="surame_kana" class="form-control" value="{{old('surame_kana')}}">
               </div>
               <!-- 名 -->
               <div class="name-form">
                  <span class="surname">名(フリガナ)</span>
                  <input type="text" name="name_kana" class="form-control" value="{{old('name_kana')}}">
               </div>
            </div>
         </div>

         <!-- 電話番号 -->
         <div class="form-group">
            <div class="form-title">電話番号<span class="form-attention">(*必須です。)</span></div>
            <input type="tel" name="phone_number" class="form-control" value="{{old('phone_number')}}" placeholder="ハイフン(-)なしで入力してください。">
         </div>

         <!-- メールアドレス -->
         <div class="form-group">
            <div class="form-title">メールアドレス<span class="form-attention">(*必須です。)</span></div>
            <input type="email" name="email" class="form-control" value="{{old('email')}}">
         </div>

         <!-- 郵便番号 -->
         <div class="form-group">
            <div class="form-title">郵便番号<span class="form-attention">(*必須です。)</span></div>
            <input type="number" name="postal_code" class="form-control postal" value="{{old('postal_code')}}" placeholder="ハイフン(-)なしで入力してください。">
         </div>

          <!-- 都道府県 -->
          <div class="form-group">
            <div class="form-title">都道府県<span class="form-attention">(*必須です。)</span></div>
            <select name="prefectures" class="form-control select">
               <!-- ヘルパー関数より -->
               @foreach (prefecturesOptions() as $prefecture)
                  <option value="{{ $prefecture }}"> {{$prefecture}}</option>
               @endforeach
            </select>
         </div>


          <!-- 市区町村 -->
          <div class="form-group">
            <div class="form-title">市区町村<span class="form-attention">(*必須です。)</span></div>
            <input type="text" name="city" class="form-control" value="{{old('city')}}">
         </div>

          <!-- 番地等 -->
          <div class="form-group">
            <div class="form-title">番地等<span class="form-attention">(*必須です。)</span></div>
            <input type="text" name="block" class="form-control" value="{{old('block')}}">
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
            <input type="submit" value="登録" class="btn submit" disabled>
            <a href="{{ route('login')}}" class="btn link">ログインへ</a>
         </div>

         <!-- 利用規格 -->
         <div class="use_regulations">
           <input type="checkbox" id="use_regulations-check">
           <label for="use_regulations-check" class="use_regulations-label">利用規約について</label>
           <!-- モーダル-->
           <div class="back-layer"></div>
           <div class="use_regulations-modal">
            <!-- ヘルパー関数 -->
            {{ use_regulations()}}
         </div>

      </form>
   </article>
@endsection