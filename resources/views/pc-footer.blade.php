<footer>
  <ul class="footer-lists">
    <li class="footer-list">
      <a href="{{ route('home')}}" class="footer-list-link">
        <div class="sub-title">トップページ</div>
      </a>
    </li>
    <li class="footer-list">
      <a href="{{ route('daily.index')}}" class="footer-list-link">
        <div class="footer-title">明日入荷予定</div>
      </a>
    </li>
    <li class="footer-list">
      <a href="{{ route('products.index') }}" class="footer-list-link">
        <div class="footer-title">オンラインショップ</div>
      </a>
    </li>
    <li class="footer-list" >
      <a href="{{ route('shops.index')}}" class="footer-list-link">
        <div class="footer-title">お店情報</div>
      </a>
    </li>
    <li class="footer-list">
      <a href="{{ route('contacts.create')}}" class="footer-list-link">
        <div class="footer-title">お問い合わせ</div>
      </a>
    </li>
  </ul>
  <div class="footer-icon">
    <img src="{{ asset('image/icon2.png')}}" alt="フッターアイコン">
  </div>
  <!-- 電話番号 -->
  <div class="footer-tel">
    <a href="tel:090-0000-0000" class="footer-tel-link">
      <img src="{{ asset('image/tel.png')}}" alt="フッター電話番号">
      電話番号:090-0000-0000
    </a>
  </div>

  <small>copy right 海鮮 2023</small>
</footer>