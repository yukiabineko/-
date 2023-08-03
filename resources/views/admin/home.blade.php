@extends('admin.app')

@section('css')
   <link rel="stylesheet" href="{{ asset('css/admin/home.css')}}">
@endsection

@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
      <h3>管理者メニュー</h3>
   </div>
   @include('share.flash')

   <!-- メインコンテンツ -->
   <article class="main-contents" >
     <ul class="menu-lists">
        <!-- 商品一覧 -->
        <li>
            <a href="{{ route('admin.products') }}">
              <img src="{{ asset('image/admin/memo.svg') }}" alt="商品一覧">
              <div class="menu-title">商品一覧</div>
            </a>
        </li>
        <!-- 新規商品登録 -->
        <li>
          <a href="{{ route('admin.products_create') }}">
            <img src="{{ asset('image/admin/new.svg') }}" alt="商品登録">
            <div class="menu-title">新規商品登録</div>
          </a>
        </li>
        <!-- お客様一覧 -->
        <li>
          <a href="{{ route('admin.users.index') }}">
            <img src="{{ asset('image/admin/users.svg') }}" alt="お客様一覧">
            <div class="menu-title">お客様一覧</div>
          </a>
        </li>
        <!-- webサイトへ -->
        <li>
          <a href="{{ route('home') }}">
            <img src="{{ asset('image/admin/internet.svg') }}" alt="webサイトへ">
            <div class="menu-title">webサイトへ</div>
          </a>
        </li>
        <!-- ログアウト -->
        <li>
          <form action="{{ route('logout') }}" method="post" class="logout-menu">
            @csrf
            <button type="submit">
              <img src="{{ asset('image/admin/logout.svg')}}" alt="ログアウト">
              <div class="menu-title">ログアウト</div>
            </button>
          </form>
        </li>
     </ul>
   </article>


@endsection