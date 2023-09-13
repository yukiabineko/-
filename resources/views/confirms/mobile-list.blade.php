<form action="{{ route('orders.store')}}" method="post">
  @csrf
  <!-- カート一覧 -->
  <ul class="confirm-mobile-lists">
    @foreach ($carts as $index =>$cart)
        <li class="confirm-mobile-list">
          <img src="{{ asset('storage/'.$cart->path) }}" alt="商品名" class="confirm-img">
          <div class="confirm-wrapper">
              <!-- 商品名 -->
              <div class="mobile-confirm-item mobile-cart-names">
                <div class="mobile-confirm-title">商品名</div>
                <div class="mobile-confirm-content-name">{{ $cart->name}}</div>
              </div>

              <!-- 価格 -->
              <div class="mobile-confirm-item mobile-cart-prices">
                <span class="mobile-confirm-content price-content">
                  <span class="mobile-confirm-base-price">{{$cart->price}}</span>
                  <span class="mobile-confirm-tax-price">{{ floor($cart->price * 1.1 ) }}(税込)</span>
                  円
                </span>
              </div>

              <!-- 個数 -->
              <div class="mobile-confirm-item mobile-cart-names">
                <div class="mobile-confirm-title">注文数</div>
                <div class="mobile-confirm-content">{{ $cart->count }}</div>
              </div>
          </div>
        </li>
    @endforeach
  </ul>
  <!-- 清算エリア -->
  <div class="liquidation">
    <div class="liquidation-wrapper">
      <!-- 合計金額 -->
      <div class="total-price">合計金額
        <span class="liquidation-total">{{ tl_p($carts) }}<span class="liquidation-tax">(税込)</span></span>円
      </div>
      <!-- ボタン -->
      <div class="confirm-btns">
        <button class="submit" onclick="return confirm('注文を確定します。よろしいですか？')">確定する</button>
        <a href="{{ route('cart.index')}}" class="back-cart-link">戻る</a>
      </div>
    </div>
</div>
 
</form>
