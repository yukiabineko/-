<header>
  <!-- ロゴ -->
  <div class="icons">
    <a href="#">
      <img src="{{ asset('image/icon.png')}}" alt="ロゴ">
    </a>
  </div>
  <!-- メニュー -->
  <div class="header-menu">
    <div class="header-menu-wrapper">
      <div class="admin-user">
        <img src="{{ asset('storage/users'.Auth::user()->id.'/'.Auth::user()->path)}}" alt="アドミンユーザー">
        <span class="admin-user-name">管理者メニュー</span>
      </div>
    </div>
   
  </div>

</header>