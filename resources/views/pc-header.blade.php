<header class="pc-header">
  <!-- アイコン -->
  <div class="icons">
    <a href="{{ route('home')}}" class="icon">
      <img src="{{ asset('image/icon.png')}}" alt="icon">
    </a>

    <!-- パソコンメニュー　 -->
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
            <ul class="menus-lists">
              @if (Auth::user()->admin == 0)
                <!-- ユーザー情報 -->
                <li class="menu-li">
                  <a href="{{ route('users.show', Auth::user() )}}" class="menu-li-link">
                    <img src="{{ asset('image/users/user.svg')}}" alt="ユーザー" class="menu-link-img">
                    <span class="menu-link-text">{{ Auth::user()->name}}さん情報</span>
                  </a>
                </li>

                <!-- ユーザー編集 -->
                <li class="menu-li">
                  <a href="{{ route('users.edit',Auth::user() )}}" class="menu-li-link">
                    <img src="{{ asset('image/users/edit.svg')}}" alt="編集" class="menu-link-img">
                    <span class="menu-link-text"> {{ Auth::user()->name}}さん編集</span>
                  </a>
                </li>

                <!-- 注文履歴 -->
                <li class="menu-li">
                  <a href="{{ route('orders.index')}}" class="menu-li-link">
                    <img src="{{ asset('image/users/memo.svg')}}" alt="注文履歴" class="menu-link-img">
                    <span class="menu-link-text">注文履歴</span>
                  </a>
                </li>
              
                <!-- 注文履歴 -->
                <li class="menu-li">
                  <a href="{{ route('contacts.index')}}" class="menu-li-link">
                    <img src="{{ asset('image/users/contacts.svg')}}" alt="お問い合わせ" class="menu-link-img">
                    <span class="menu-link-text"> お問い合わせ一覧</span>
                  </a>
                </li>
              @else
                <li class="menu-li"><a href="{{ route('admin.home')}}" class="menu-li-link">管理画面へ</a></li>  
              @endif
              <li class="menu-li">
                <form action="{{ route('logout')}}" method="post" class="logout-form">
                  @csrf
                  <button type="submit" class="logout-button">
                    <img src="{{ asset('image/users/logout.svg')}}" alt="ログアウト" class="logout-img">
                    <span class="logout-img-text">ログアウト</span>
                  </button>
                </form>
              </li>
            </ul>
            <!-- ショッピングカート -->
            <a href="{{route('cart.index')}}" class="cart">
              <img src="{{ asset('image/cart1.png')}}" alt="カート" class="cart-img">
              <span class="cart-count {{ !empty( session('cart'))? 'cart-exists' : ''}}">
                {{ !empty( session('cart'))? count( session('cart') ) :  0}}
              </span>
            </a>
          </div>
       @endif
    </div>
  </div>

  <!-- /アイコン -->
  <!-- グローバルナビ　-->
  <nav>
    <ul class="nav-lists">
      <li class="nav-list {{ request()->path() == '/'? 'active': ''}}">
        <a href="{{ route('home')}}" class="nav-list-link">
          <div class="main-title">TOP</div>
          <div class="sub-title">トップページ</div>
        </a>
      </li>
      <li class="nav-list {{ request()->path() == 'daily'? 'active': ''}}">
        <a href="{{ route('daily.index')}}" class="nav-list-link">
          <div class="main-title">ARRIVALS</div>
          <div class="sub-title">生鮮入荷予定</div>
        </a>
      </li>
      <li class="nav-list {{ request()->path() == 'products'? 'active': ''}}">
        <a href="{{ route('products.index') }}" class="nav-list-link">
          <div class="main-title">ONLINE</div>
          <div class="sub-title">オンラインショップ</div>
        </a>
      </li>
      <li class="nav-list {{ request()->path() == 'shops'? 'active': ''}}">
        <a href="{{ route('shops.index')}}" class="nav-list-link" >
          <div class="main-title">SHOP</div>
          <div class="sub-title">お店情報</div>
        </a>
      </li>
      
      <li class="nav-list {{ request()->path() == 'contacts/create'? 'active': ''}}">
        <a href="{{ route('contacts.create')}}" class="nav-list-link">
          <div class="main-title">CONTACT</div>
          <div class="sub-title">お問い合わせ</div>
        </a>
      </li>
    </ul>
  </nav>
</header>
