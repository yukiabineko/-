<table class="confirm-table">
  <thead>
    <tr>
      <th></th>
      <th>商品名</th>
      <th>価格</th>
      <th>数量</th>
      <th>合計金額</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach ($carts as $index =>$cart)
    <tr id="row-{{$index}}">
      <td class="img-td">
        <img src="{{ asset('storage/'.$cart->path) }}" alt="商品名" class="confirm-img">
      </td>
      <td>{{ $cart->name}}</td>
      <td class="price"><span id="price-{{ $cart->product_id }}">{{ floor($cart->price * 1.1 ) }}</span>円(税込)</td>
      <td>{{ $cart->count}}</td>
      <td class="total"><span id="total-{{$cart->product_id }}" class="product-total">{{  (int)$cart->count *  floor($cart->price * 1.1 ) }}</span>(税込)</td>
      
      <input type="hidden" name="path[]" value="{{ $cart->path }}" class="pc-input">
      <input type="hidden" name="name[]" value="{{ $cart->name }}" class="pc-input">
      <input type="hidden" name="price[]" value="{{ $cart->price }}" class="pc-input">
      <input type="hidden" name="product_id[]" value="{{ $cart->product_id }}" class="pc-input">
    </tr>
  @endforeach
  </tbody>
</table> 