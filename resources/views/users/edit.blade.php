@extends('app')
@section('title')
   {{ $user->surname}} {{$user->name}}さん編集
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form.css')}}">
@endsection
@section('js')
    <script src="{{ asset('js/register.js')}}"></script>
@endsection

@section('contents')
   <div class="page-title">
     <h2>{{ $user->surname}} {{ $user->name}}さん情報編集</h2>
   </div>

   <article class="main-contents">
      <!-- エラー表示 -->
      @include('share.errors')
      
      <form action="{{ route('users.update',$user)}}" class="form new-user" enctype="multipart/form-data" method="POST">
        @csrf
        @method('patch')
        <!-- 画像 -->
        <div class="form-group file-group">
           <img src="{{ asset('storage/users'.$user->id.'/'.$user->path )}}" alt="ユーザー画像" id="file-img">
           <div class="form-title">プロフィール写真</div>
           <div class="files">
            <span class="file-text">{{ $user->path}}</span>
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
                  <input type="text" name="surname" class="form-control" value="{{old('surname',$user->surname )}}">
               </div>
               <!-- 名 -->
               <div class="name-form">
                  <span class="surname">名</span>
                  <input type="text" name="name" class="form-control" value="{{old('name',$user->name )}}">
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
                  <input type="text" name="surame_kana" class="form-control" value="{{old('surame_kana',$user->surame_kana)}}">
               </div>
               <!-- 名 -->
               <div class="name-form">
                  <span class="surname">名(フリガナ)</span>
                  <input type="text" name="name_kana" class="form-control" value="{{old('name_kana',$user->name_kana )}}">
               </div>
            </div>
         </div>

         <!-- 電話番号 -->
         <div class="form-group">
            <div class="form-title">電話番号<span class="form-attention">(*必須です。)</span></div>
            <input type="tel" name="phone_number" class="form-control" value="{{old('phone_number',$user->phone_number )}}" placeholder="ハイフン(-)なしで入力してください。">
         </div>

         <!-- メールアドレス -->
         <div class="form-group">
            <div class="form-title">メールアドレス<span class="form-attention">(*必須です。)</span></div>
            <input type="email" name="email" class="form-control" value="{{old('email',$user->email )}}">
         </div>

         <!-- 郵便番号 -->
         <div class="form-group">
            <div class="form-title">郵便番号<span class="form-attention">(*必須です。)</span></div>
            <input type="number" name="postal_code" class="form-control postal" value="{{old('postal_code',$user->postal_code )}}" placeholder="ハイフン(-)なしで入力してください。">
         </div>

          <!-- 都道府県 -->
          <div class="form-group">
            <div class="form-title">都道府県<span class="form-attention">(*必須です。)</span></div>
            <select name="prefectures" class="form-control select">
               <!-- ヘルパー関数より -->
               @foreach (prefecturesOptions() as $prefecture)
                  <option value="{{ $prefecture }}" {{ $user->prefectures == $prefecture ? "selected" : ""}}> {{$prefecture}}</option>
               @endforeach
            </select>
         </div>


          <!-- 市区町村 -->
          <div class="form-group">
            <div class="form-title">市区町村<span class="form-attention">(*必須です。)</span></div>
            <input type="text" name="city" class="form-control" value="{{old('city', $user->city)}}">
         </div>

          <!-- 番地等 -->
          <div class="form-group">
            <div class="form-title">番地等<span class="form-attention">(*必須です。)</span></div>
            <input type="text" name="block" class="form-control" value="{{old('block',$user->block)}}">
         </div>

          

          <div class="form-button">
            @if (Request::routeIs('users.edit'))
              <input type="submit" value="編集" class="btn submit">  
            @else
              <input type="submit" value="登録" class="btn submit" disabled>
            @endif
            <a href="{{ route('login')}}" class="btn link">ログインへ</a>
         </div>


      </form>
   </article>
@endsection