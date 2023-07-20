<!-- 商品リスト -->
<ul class="product-lists">
  @foreach ($products as $product)
    <li>
      <img 
        src="{{ asset('storage/products/products'.$product->id.'/'.$product->thumbnail() ) }}" 
        alt="商品" class="product-img">
      <div class="product-info">
         <div class="product-name">{{ $product->name }}</div>
         <div class="product-price">
          <span class="price-quantity">1パック</span>
          <span>
            <span class="price-number">{{ $product->tax() }}</span>円(税込)
          </span>
         
        </div>
      </div>
      <div class="product-link">
        <a 
          href="{{ route('products.show',$product)}}" 
          class="link-button {{request()->path() == 'products'? 'online-link' : ''}}"
          >{{request()->path() == 'products'? '注文する' : '詳しくはこちら'}}</a>
      </div>
    </li>  
  @endforeach
</ul>