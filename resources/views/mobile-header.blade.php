<header class="mobile-header">
  <!-- アイコン(左側) -->
  <a href="{{ route('home')}}" class="mobile-top-icon" id="header-icon">
    <img src="{{ asset('image/icon.png')}}" alt="トップアイコン">
  </a>
  <!-- 右側ハンバーガーメニュ -->
  <div class="hamburger-menu">
    <label for="hamberger-checkbox" class="hamburger">
     
    </label>
    <input type="checkbox" id="hamberger-checkbox">
    <span class="hamburger-span"></span>
    <div class="mobile-menu-background"></div>

    <!--メニュー -->
    <div class="menus">
    <!---------- 認証完了時 ------------------------->
      @if (Auth::check())
       <div class="mobile-user-info">
          <!-- お客様名 -->
          <div class="mobile-user-name">
            <img 
              src="{{ asset('storage/users'.Auth::id().'/'.Auth::user()->path)}}" 
              alt="user" class="mobile-auth-img">
            <div class="mobile-name-text">{{ Auth::user()->name}}様</div>
          </div>

          <!-- 買い物かご -->
          <div class="mobile-cart">
            <!-- アイコンタイトル  -->
            <a href="{{ route('cart.index')}}" class="mobile-cart-title">
              <img src="{{ asset('image/cart1.png')}}" alt="カートかご" class="mobile-cart-icon">
              <div class="mobile-cart-title">買い物かご</div>
            </a>
            <!-- 個数 -->
            <div 
             class="mobile-cart-count {{ !empty( session('cart'))? 'mobile-cart-exists' : ''}}"
             > {{ !empty( session('cart'))? count( session('cart') ) :  0}}</div>
          </div>

          <!-- ユーザーメニュー -->
          <ul class="mobile-auth-menu">
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

       </div> 
     <!---------- 未認証時 ------------------------->
      @else
        <a href="{{route('login')}}" class="mobile-login-link">ログイン</a>  
      @endif
      <!---------- 共通項目 ------------------------->
      <!-- 各ページリスト -->
      <div class="mobile-page-header">ページリスト</div>
      <ul class="mobile-page-menus">
        <li class="mobile-page-list">
          <a href="{{ route('home')}}" class="mobile-page-link">
            <div class="main-title">TOP</div>
            <div class="sub-title">トップページ</div>
          </a>
        </li>
        <li class="mobile-page-list">
          <a href="{{ route('daily.index')}}" class="mobile-page-link">
            <div class="main-title">ARRIVALS</div>
            <div class="sub-title">生鮮入荷予定</div>
          </a>
        </li>
        <li class="mobile-page-list">
          <a href="{{ route('products.index') }}" class="mobile-page-link">
            <div class="main-title">ONLINE</div>
            <div class="sub-title">オンラインショップ</div>
          </a>
        </li>
        <li class="mobile-page-list">
          <a href="{{ route('shops.index')}}" class="mobile-page-link" >
            <div class="main-title">SHOP</div>
            <div class="sub-title">お店情報</div>
          </a>
        </li>

        <li class="mobile-page-list mobile-list-last">
          <a href="tel:090-xxxx-xxxx" class="mobile-page-link">
            <div class="main-title">PHONE</div>
            <div class="sub-title">電話お問い合わせ</div>
          </a>
        </li>
        
        <li class="mobile-page-list mobile-list-last">
          <a href="{{ route('contacts.create')}}" class="mobile-page-link">
            <div class="main-title">CONTACT</div>
            <div class="sub-title">メールお問い合わせ</div>
          </a>
        </li>
      </ul>

    </div>
  </div>
</header>
