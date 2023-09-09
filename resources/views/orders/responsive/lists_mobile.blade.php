<ul class="lists-mobile-history">
  @foreach ($orders as $order)
    <li class="list-mobile-history">
      <!-- 商品画像 -->
      <img 
        src="{{ Storage::exists('public/'.$order->path)?
        asset('storage/'.$order->path)
        :
        asset('image/noimage.png')
        }}" 
        alt="商品画像" class="order-item-img">

      <!-- 注文日 -->
      <div class="mobile-list-wrapper">
        <div class="mobile-list-title">注文日</div>
        <div class="mobile-list-content">
          {{ date('Y年m月d日',strtotime($order->created_at))}}
        </div>
      </div>

      <!-- 商品名 -->
      <div class="mobile-list-wrapper">
        <div class="mobile-list-content mobile-list-content-name">
          {{ $order->name }}
        </div>
      </div>

      <!-- 価格 -->
      <div class="mobile-list-wrapper">
        <div class="mobile-list-title">価格</div>
        <div class="mobile-list-content">
          <span class="price">
            {{ $order->price}}
            <span class="tax">
              {{ floor((int)$order->price * 1.1 )}}(税込)
              <span class="en">円</span>
            </span>
          </span>
        </div>
      </div>

      <!-- 詳細ボタン -->
      <a href="{{ route('products.show', $order->product_id)}}" class="btn-link">商品の詳細</a>

    </li> 
  @endforeach
</ul>