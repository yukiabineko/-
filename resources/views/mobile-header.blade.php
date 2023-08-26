<header class="mobile-header">
  <!-- アイコン(左側) -->
  <a href="{{ route('home')}}" class="mobile-top-icon">
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
      <div class="mobile-hamburger-title">
        <h3>メニュー</h3>
      </div>
    <!---------- 認証完了時 ------------------------->
      @if (Auth::check())
       <div class="mobile-user-info">
          <img 
          src="{{ asset('storage/users'.Auth::id().'/'.Auth::user()->path)}}" 
          alt="user" class="mobile-auth-img">
         <!-- お客様名 -->
         <div class="mobile-user-name">{{ Auth::user()->name}}様</div>
        <!-- 買い物かご -->
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
          <a href="{{ route('contacts.create')}}" class="mobile-page-link">
            <div class="main-title">CONTACT</div>
            <div class="sub-title">お問い合わせ</div>
          </a>
        </li>
      </ul>

    </div>
  </div>
</header>
