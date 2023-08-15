<table class="lists-pc-history">
  <thead>
    <tr>
      <th>注文日</th>
      <th>商品名</th>
      <th>価格</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
        <tr>
          <td>{{ date('Y年m月d日',strtotime($order->created_at))}}</td>
          <td>
            <div class="oder-items">
              <img 
               src="{{ Storage::exists('public/'.$order->path)?
                asset('storage/'.$order->path)
                :
                asset('image/noimage.png')
                }}" 
               alt="商品画像" class="oder-item-img">
               <div class="order-item-name">{{ $order->name }}</div>
            </div>
          </td>
          <td>{{ floor((int)$order->price * 1.1 )}}円(税込)</td>
          <td>
            <a href="{{ route('products.show', $order->product_id)}}">商品の詳細</a>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>