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
        <li>a</li>
        <li>b</li>
        <li>c</li>
        <li>d</li>
      </ul>
    </div>
  </div>

</header>