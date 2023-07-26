<header>
  <!-- ロゴ -->
  <div class="icons">
    <a href="#">
      <img src="{{ asset('image/icon3.png')}}" alt="ロゴ">
    </a>
  </div>
  <!-- メニュー -->
  <div class="header-menu">
    <label class="header-menu-wrapper" for="check">
      <div class="admin-user">
        <img src="{{ asset('storage/users'.Auth::user()->id.'/'.Auth::user()->path)}}" alt="アドミンユーザー">
        <span class="admin-user-name">Menu</span>
      </div>
    </label>
    <input type="checkbox" id="check">
    <span class="header-up">🔺</span>
    <span class="header-down">🔻</span>

    <!-- スライダーメニュー -->
    <div class="header-slider">
      <ul>
        <li>
          <a href="{{ route('admin.products')}}">商品一覧</a>
        </li>
        <li>
          <a href="{{ route('admin.products_create')}}">商品新規登録</a>
        </li>
        <li>
          <a href="{{ route('admin.users.index')}}">お客様一覧</a>
        </li>
        <li>
          <a href="{{ route('home')}}">webサイトへ</a>
        </li>
        <li>
          <form action="{{ route('logout')}}" method="post">
            @csrf
            <button type="submit">ログアウト</button>
          </form>
        </li>
      </ul>
    </div>
  </div>

</header>