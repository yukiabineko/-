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
          <form action="#" method="post" class="cart-form">
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
              @foreach ($carts as $cart)
                <tr>
                  <td class="img-td">
                    <img src="{{ asset('storage/'.$cart['path']) }}" alt="商品名">
                  </td>
                  <td>{{ $cart['name']}}</td>
                  <td class="price"><span id="price-{{ $cart['product_id'] }}">{{ floor($cart['price'] * 1.1 ) }}</span>(税込)</td>
                  <td>
                  <select name="count" id="select-{{ $cart['product_id']}}" onchange="calcTotal({{ $cart['product_id'] }})">
                    @for( $i =0; $i<= (int)$cart['max']; $i++ )
                        <option value="{{ $i}}" {{ (int)$cart['count'] == (int)$i? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                  </select>
                  </td>
                  <td class="total" id="total-{{$cart['product_id']}}"><span class="price">{{  (int)$cart['count'] *  floor($cart['price'] * 1.1 ) }}</span>(税込)</td>
                </tr>
              
              @endforeach
              </tbody>
            </table> 
            <!-- 会計フォーム -->
            <aside class="accounting">
              <div class="total-title">合計金額</div>
              <!-- 自作ヘルパー関数使用(tl_p)-->
              <div class="total"><span id="total-num">{{ tl_p($carts)}}</span>円</div>
              <button type="submit" class="btn btn-submit">会計する</button>
              <a href="{{ route('products.index')}}">買い物を続ける</a>
            </aside>
          </form>
        @else
            
        @endif
      </article>
  </section>
@endsection
