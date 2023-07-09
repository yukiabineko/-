<header>
  <!-- アイコン -->
  <div class="icons">
    <a href="#" class="icon">
      <img src="{{ asset('image/icon.png')}}" alt="icon">
    </a>

    <div class="auth-wrapper">
      <a href="tel:055-0000-0000" class="tel">
        <img src="{{ asset('image/tel.svg')}}" alt="電話番号">
        電話番号090-0000-0000
      </a>
<!-------------------------- 未ログイン時の表示　-------------------------------------------------------------------------->
       @if (!Auth::check())
          <div class="auth-btns">
            <a href="{{ route('register')}}" class="btn auth-btn">新規会員登録</a>
            <a href="{{ route('login')}}" class="btn auth-btn">ログイン</a>
          </div>
<!-------------------------- ログイン時の表示　-------------------------------------------------------------------------->
       @else
          <div class="user-menu">
            <label class="user" for="check">
              <img src="{{asset('storage/users'.Auth::id().'/'. Auth::user()->path)}}" alt="ユーザー" class="user-img">
              <div class="user-name">{{ Auth::user()->name }}さん</div>
            </label>
            <input type="checkbox"  id="check">
            <ul class="menus">
              <li class="menu-li"><a href="#">{{ Auth::user()->name}}さん情報</a></li>
              <li class="menu-li"><a href="#">{{ Auth::user()->name}}さん編集</a></li>
              <li class="menu-li">ログアウト</li>
            </ul>
          </div>
       @endif
    </div>
  </div>
  <!-- /アイコン -->
  <!-- グローバルナビ　-->
  <nav>
    <ul class="nav-lists">
      <li class="nav-list {{ request()->path() == '/'? 'active': ''}}">
        <a href="#" class="nav-list-link">
          <div class="main-title">TOP</div>
          <div class="sub-title">トップページ</div>
        </a>
      </li>
      <li class="nav-list">
        <a href="#" class="nav-list-link">
          <div class="main-title">ARRIVALS</div>
          <div class="sub-title">生鮮入荷予定</div>
        </a>
      </li>
      <li class="nav-list">
        <a href="#" class="nav-list-link">
          <div class="main-title">ONLINE</div>
          <div class="sub-title">オンラインショップ</div>
        </a>
      </li>
      <li class="nav-list">
        <a href="#" class="nav-list-link" >
          <div class="main-title">SHOP</div>
          <div class="sub-title">お店情報</div>
        </a>
      </li>
      <li class="nav-list">
        <a href="#" class="nav-list-link">
          <div class="main-title">CONTACT</div>
          <div class="sub-title">お問い合わせ</div>
        </a>
      </li>
    </ul>
  </nav>


</header>