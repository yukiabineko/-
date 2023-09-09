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
            <!-- pc /モバイルテーブル　-->
            @include('carts/pc-list')
            @include('carts/mobile-list')

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
