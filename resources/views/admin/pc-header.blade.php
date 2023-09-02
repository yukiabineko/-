<header class="pc-header">
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
          <a href="{{ route('admin.home')}}">
            <img src="{{ asset('image/admin/admin-slider-home.svg')}}" alt="home">
            管理者トップ
          </a>
        </li>
        <li>
          <a href="{{ route('admin.products')}}">
            <img src="{{ asset('image/admin/admin-slider-list.svg')}}" alt="list">
            商品一覧
          </a>
        </li>
        <li>
          <a href="{{ route('admin.products_create')}}">
            <img src="{{ asset('image/admin/admin-slider-new.svg')}}" alt="new">
            商品新規登録
          </a>
        </li>
        <li>
          <a href="{{ route('admin.users.index')}}">
            <img src="{{ asset('image/admin/admin-slider-user.svg')}}" alt="user">
            お客様一覧
          </a>
        </li>
        <li>
          <a href="{{ route('home')}}">
            <img src="{{ asset('image/admin/admin-slider-internet.svg')}}" alt="web">
            webサイトへ
          </a>
        </li>
        <li>
          <a href="{{ route('admin_contacts.index')}}">
            <img src="{{ asset('image/admin/admin-contacts.svg')}}" alt="お問い合わせ">
            お問い合わせ一覧へ
          </a>
        </li>
        <li>
          <form action="{{ route('logout')}}" method="post">
            @csrf
            <button type="submit">
              <img src="{{ asset('image/admin/admin-slider-logout.svg')}}" alt="logout">
              ログアウト
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>

</header>