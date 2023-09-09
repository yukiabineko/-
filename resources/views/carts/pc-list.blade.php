<table class="cart-table">
  <thead>
    <tr>
      <th></th>
      <th>商品名</th>
      <th>価格</th>
      <th>数量</th>
      <th>合計金額</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($carts as $index =>$cart)
    <tr id="row-{{$index}}">
      <td class="img-td">
        <img src="{{ asset('storage/'.$cart['path']) }}" alt="商品名">
      </td>
      <td>{{ $cart['name']}}</td>
      <td class="price"><span id="price-{{ $cart['product_id'] }}">{{ floor($cart['price'] * 1.1 ) }}</span>円(税込)</td>
      <td>
        <select name="count[]" id="select-{{ $cart['product_id']}}" onchange="calcTotal({{ $cart['product_id'] }})">
          @for( $i =0; $i<= (int)$cart['max']; $i++ )
              <option value="{{ $i}}" {{ (int)$cart['count'] == (int)$i? 'selected' : '' }}>{{ $i }}</option>
          @endfor
        </select>
      </td>
      <td class="total"><span id="total-{{$cart['product_id']}}" class="product-total">{{  (int)$cart['count'] *  floor($cart['price'] * 1.1 ) }}</span>(税込)</td>
      <td>
        <button 
          type="button" 
          onclick="deleteItem({{ $index }})"
          class="delete-btns"
          >削除</button>
      </td>
      <input type="hidden" name="path[]" value="{{ $cart['path'] }}">
      <input type="hidden" name="name[]" value="{{ $cart['name'] }}">
      <input type="hidden" name="price[]" value="{{ $cart['price'] }}">
      <input type="hidden" name="product_id[]" value="{{ $cart['product_id'] }}">
    </tr>
  @endforeach
  </tbody>
</table> 