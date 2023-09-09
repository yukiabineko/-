@if ( count( $carts) > 0)
  <ul class="mobile-cart-lists">
    @foreach ($carts as $index =>$cart)
       <li class="mobile-cart-list" id="list-{{$index}}">
          <img src="{{ asset('storage/'.$cart['path']) }}" alt="商品名" class="mobile-cart-img">

          <!-- 商品名 -->
          <div class="mobile-cart-item mobile-cart-names">
            <div class="mobile-cart-title">商品名</div>
            <div class="mobile-cart-content">{{ $cart['name']}}</div>
          </div>

          <!-- 価格 -->
          <div class="mobile-cart-item mobile-cart-prices">
            <span class="mobile-cart-content price-content">
              <span class="mobile-cart-base-price">{{$cart['price']}}</span>
              <span class="mobile-cart-tax-price">{{ floor($cart['price'] * 1.1 ) }}(税込)</span>
              円
            </span>
          </div>

          <!-- 注文数 -->
          <div class="mobile-cart-item mobile-cart-names">
            <div class="mobile-cart-title">注文数</div>
            <div class="mobile-cart-content">
              <select name="count[]" id="select-{{ $cart['product_id']}}" onchange="calcTotal({{ $cart['product_id'] }})">
                @for( $i =0; $i<= (int)$cart['max']; $i++ )
                    <option value="{{ $i }}" {{ (int)$cart['count'] == (int)$i? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>

          <!-- 削除ボタン -->
          <button 
            type="button" 
            onclick="deleteItem({{ $index }})"
            class="delete-btns"
            >削除</button>

          <input type="hidden" name="path[]" value="{{ $cart['path'] }}">
          <input type="hidden" name="name[]" value="{{ $cart['name'] }}">
          <input type="hidden" name="price[]" value="{{ $cart['price'] }}">
          <input type="hidden" name="product_id[]" value="{{ $cart['product_id'] }}">
       </li>
    @endforeach
  </ul>
@else
  <div class="empty">何も選択していません。</div>
@endif
