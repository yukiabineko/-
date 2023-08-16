<table class="lists-pc-history">
  <thead>
    <tr>
      <th class="th-day">注文日</th>
      <th class="th-name">商品名</th>
      <th class="th-price">価格</th>
      <th class="th-link"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
        <tr>
          <td>{{ date('Y年m月d日',strtotime($order->created_at))}}</td>
          <td>
            <div class="order-items">
              <img 
               src="{{ Storage::exists('public/'.$order->path)?
                asset('storage/'.$order->path)
                :
                asset('image/noimage.png')
                }}" 
               alt="商品画像" class="order-item-img">
               <div class="order-item-name">{{ $order->name }}</div>
            </div>
          </td>
          <td>
            <div class="excluded-wrapper">
              <span class="excluded">{{ $order->price}}</span>円
            </div>
            <span class="tax">{{ floor((int)$order->price * 1.1 )}}円(税込)</span></td>
          <td>
            <a href="{{ route('products.show', $order->product_id)}}" class="btn-link">商品の詳細</a>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>