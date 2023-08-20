@extends('app')
@section('title')
   {{ $user->surname}} {{$user->name}}さん編集
@endsection
@section('css')
   <link rel="stylesheet" href="{{ asset('css/users/show.css')}}">
@endsection
@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
     <h2>会員様詳細ページ</h2>
   </div>

   <section class="contents">
    <!-- メニューエリア -->
      <aside>
        <ul class="user-link-lists">
          <!-- トップページ -->
          <li class="user-link-list">
            <a href="{{ route('home')}}" class="user-link-a">
              <img src="{{ asset('image/users/home.svg')}}" alt="ホーム">
              <span class="user-page-link-title">トップページに戻る</span>
            </a>
          </li>

          <!-- 会員情報編集 -->
          <li class="user-link-list">
            <a href="{{ route('users.edit', $user)}}" class="user-link-a">
              <img src="{{ asset('image/users/edit.svg')}}" alt="会員編集">
              <span class="user-page-link-title">会員情報編集</span>
            </a>
          </li>

          <!-- 注文状況 -->
          <li class="user-link-list">
            <a href="{{ route('orders.index')}}" class="user-link-a">
              <img src="{{ asset('image/users/memo.svg')}}" alt="注文状況">
              <span class="user-page-link-title">注文状況</span>
            </a>
          </li>

          <!-- お問い合わせ状況 -->
          <li class="user-link-list">
            <a href="{{ route('contacts.index')}}" class="user-link-a">
              <img src="{{ asset('image/users/contacts.svg')}}" alt="お問い合わせ状況">
              <span class="user-page-link-title">問い合わせ状況</span>
            </a>
          </li>

          <!-- 買い物かご -->
          <li class="user-link-list">
            @if ( session('cart'))
              <a href="{{ route('users.edit', $user)}}" class="user-link-a">
                <img src="{{ asset('image/users/cart.svg')}}" alt="買い物かご">
                <span class="user-page-link-title">買い物かご</span>
                <span class="user-cart-count"> {{ !empty( session('cart'))? count( session('cart') ) :  0}}</span>
              </a>
            @else
               <div class="user-link-cart">
                <img src="{{ asset('image/users/cart2.svg')}}" alt="買い物かご">
                <span class="user-page-empty-title">買い物かご</span>
               </div>  
            @endif
           
          </li>
        </ul>
      </aside>

      <!-- メインエリア -->
      <article class="main-contents">
        <div class="user-name">
          <img src="{{ asset('storage/users'.$user->id.'/'.$user->path)}}" alt="{{ $user->path }}">
          <div class="name-info">
            <div class="name">{{ $user->surname }} {{ $user->name}}様</div>
            <div class="sub-name">{{ $user->surame_kana }} {{ $user->name_kana }}様</div>
          </div>
        </div>
        <table class="user-table">
          <tbody>
            <!-- メールアドレス -->
            <tr>
              <th>メールアドレス</th>
              <td>{{ $user->email }}</td>
            </tr>

            <!-- 電話番号 -->
            <tr>
              <th>電話番号</th>
              <td>{{ $user-> phone_number }}</td>
            </tr>

             <!-- 住所 -->
             <tr class="adress-tr">
              <th>住所</th>
              <td>
                <div class="postal-code">〒{{ substr_replace($user->postal_code, '-', 3, 0) }}</div>
                <div class="adress">
                   {{ $user->prefectures}} {{ $user->city}} {{ $user->block}}
                </div>
              </td>
            </tr>
          </tbody>
        </table>
    </article>
   </section>

   
@endsection