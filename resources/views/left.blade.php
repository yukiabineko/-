<aside class="left">
  <!-- 検索ボックス -->
  <section class="left-search-box">
    <h3>通販商品検索</h3>
    <form action="{{ route('products.index')}}" method="GET" class="search-form">
      <p class="search-title">商品名を入力してください。</p>
      <input type="search" name="name" class="search-box">
      <button type="submit">検索</button>
    </form>
  </section>

  <!--商品カテゴリーボックス-->
  <section class="left-category-box">
    <h3>カテゴリーで検索</h3>
    <ul class="left-category-lists">
      <!-- カテゴリー1 -->
      <li class="left-category-list">
        <a href="{{ route('daily.index')}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item1.png')}}" alt="アイテム1" class="left-category-img">
          日替わり生鮮商品
        </a>
      </li>
       <!-- カテゴリー2 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 1])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item3.png')}}" alt="アイテム2" class="left-category-img">
          塩鮭類
        </a>
      </li>
       <!-- カテゴリー3 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 3])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item5.png')}}" alt="アイテム3" class="left-category-img">
          魚卵類
        </a>
      </li>
       <!-- カテゴリー4 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 4])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item4.png')}}" alt="アイテム4" class="left-category-img">
          丸干類
        </a>
      </li>
       <!-- カテゴリー5 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 2])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item2.png')}}" alt="アイテム5" class="left-category-img">
          干物類
        </a>
      </li>
       <!-- カテゴリー6 -->
       <li class="left-category-list">
        <a href="#" class="left-category-link">
          <img src="{{ asset('image/left/left-item6.png')}}" alt="アイテム6" class="left-category-img">
          珍味類
        </a>
      </li>
       <!-- カテゴリー7 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 6])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item7.png')}}" alt="アイテム7" class="left-category-img">
          ちりめん類
        </a>
      </li>
       <!-- カテゴリー8 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 7])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item8.png')}}" alt="アイテム8" class="left-category-img">
          うなぎ類
        </a>
      </li>
       <!-- カテゴリー9 -->
       <li class="left-category-list">
        <a href="{{ route('products.index',['category' => 8])}}" class="left-category-link">
          <img src="{{ asset('image/left/left-item9.png')}}" alt="アイテム9" class="left-category-img">
          冷凍エビ、カニ類
        </a>
      </li>

    </ul>
  </section>

</aside>