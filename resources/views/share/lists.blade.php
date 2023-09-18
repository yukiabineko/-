<!-- 商品リスト -->
@if ( count($products))
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
            <div class="price-wrappper">
              <span class="price-number">{{ $product->price }}</span>円
              <div class="tax">{{ $product->tax()}}円(税込)</div>
            </div>
          
          </div>
        </div>
        <div class="product-link">
          <a 
            href="{{ route('products.show',$product)}}" 
            class="link-button {{request()->path() == 'products'? 'online-link' : ''}}"
            >{{request()->path() == 'products'? '注文する' : '詳細'}}</a>
        </div>
      </li>  
    @endforeach
  </ul>    
@else
  <div class="empty">該当するデータはありません。</div>
@endif
