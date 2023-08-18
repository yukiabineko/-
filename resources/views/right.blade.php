<aside class="right">
  <section class="sns">
    <h3>外部リンク</h3>
    <ul class="sns-link-lists">
        <!-- リンク１ -->
        <li class="sns-link-list">
          <a href="https://twitter.com/">
            <img src="{{ asset('image/right/twitter.png')}}" alt="twitter">Twitter
          </a>
        </li>
        <!-- リンク2 -->
        <li class="sns-link-list">
          <a href="https://line.me/ja/">
            <img src="{{ asset('image/right/line.png')}}" alt="line">LINE
          </a>
        </li>
        <!-- リンク3-->
        <li class="sns-link-list">
          <a href="https://www.instagram.com/">
            <img src="{{ asset('image/right/instagram.png')}}" alt="instagram">Instagram
          </a>
        </li>
        <!-- リンク4 -->
        <li class="sns-link-list">
          <a href="https://ja-jp.facebook.com/">
            <img src="{{ asset('image/right/facebook.png')}}" alt="facebook">Facebook
          </a>
        </li>
        <!-- リンク4 -->
        <li class="sns-link-list">
          <a href="https://www.youtube.com/">
            <img src="{{ asset('image/right/youtube.png')}}" alt="youtube">Youtube
          </a>
        </li>
    </ul>

    <!-- 問合せ -->
    <section class="right-contact">
      <h3>お問い合わせ</h3>
      <a href="tel:090-0000-0000">
        <img src="{{ asset('image/right/tel.png')}}" alt="電話番号">090-0000-0000
      </a>
      <a href="{{ route('contacts.create')}}">
        <img src="{{ asset('image/right/mail.png')}}" alt="メール">問合せフォーム
      </a>
    </section>
    
  </section>
</aside>