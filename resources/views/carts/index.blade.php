@extends('app')
<!-- タイトル -->
@section('title')
    買い物かご
@endsection

<!-- css -->
@section('css')
  <link rel="stylesheet" href="{{ asset('css/carts/index.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
  <script src="{{ asset('js/cart/index.js')}}"></script>
@endsection

<!-- コンテンツ -->
@section('contents')
  <!-- コンテンツ -->

  <section class="cart-contents">
   <!-- タイトル -->
   <div class="cart-title">
      <h3>買い物かご</h3>
   </div>

   <p class="info-title">まだ買い物が確定していません。注文数量、価格等を確認して注文を確定してください。</p>
   
   <!-- メイン -->
      <!-- リスト -->
      <article class="carts">
        @if ( session('cart'))
          <form action="{{ route('orders.store')}}" method="post" class="cart-form">
            @csrf
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
                  <input type="hidden" name="product_id[]" value="{{ $cart['product_id']}}">
                </tr>
              @endforeach
              </tbody>
            </table> 
            <!-- 会計フォーム -->
            <aside class="accounting">
              <div class="total-title">カート内容</div>
              <div class="wrapper-accojnting">
                <!-- 自作ヘルパー関数使用(tl_p)-->
                <div class="total">
                  <div class="total-price-title">合計金額</div>
                  <div class="total-price">
                    <span id="total-num">{{ tl_p($carts)}}</span>円(税込)
                  </div>
                </div>
                <button type="submit" class="btn btn-submit">会計する</button>
                <a href="{{ route('products.index')}}" class="btn btn-continue">買い物を続ける</a>
              </div>
            </aside>
          </form>
        @else
            
        @endif
      </article>
  </section>
@endsection
