@extends('admin.app')

@section('css')
   <link rel="stylesheet" href="{{ asset('css/admin/products/index.css')}}">
@endsection

@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
      <h3>商品一覧</h3>
   </div>
   @include('share.flash')

   <!-- メインコンテンツ -->
   <article class="main-contents">
<!------------------------------------------------------------------------------------------------------------------------->
      <!-- 左検索エリア　-->
      <section class="search-area">
        <div class="search-title">
          <h3>商品検索</h3>
        </div>
       
        <p>*条件を入力して検索してください</p>
        <form action="{{ route('admin.products')}}" method="get" class="search-form">
          <!-- 商品名 -->
          <div class="form-group">
            <div class="form-title">商品名</div>
            <input type="text" name="name" class="form-control" value="{{Request::get('name')}}" placeholder="商品名を入力してください。">
          </div>

          <!-- 価格帯 -->
          <div class="form-group">
            <div class="form-title">価格帯</div>
            <div class="form-controls">
              <input type="number" name="min-price" class="form-control" value="{{Request::get('min-price')}}" placeholder="最低価格">
              <span>~</span>
              <input type="number" name="max-price" class="form-control" value="{{Request::get('max-price')}}" placeholder="最高価格">
            </div>
          </div>

          <!-- 在庫数 -->
          <div class="form-group">
          <div class="form-title">在庫数</div>
            <input type="text" name="stock" class="form-control" value="{{Request::get('stock')}}" placeholder="在庫数を入力してください。">
          </div>

          <!-- カテゴリー -->
          <div class="form-group">
            <div class="form-title">カテゴリー</div>
            <select name="category" class="form-control">
              <option value="10" {{ Request::get('category') == 0 ? 'selected' : ''}} >日替わり商品</option>
              <option value="1" {{ Request::get('category') == 1 ? 'selected' : ''}}>塩鮭</option>
              <option value="2" {{ Request::get('category') == 2 ? 'selected' : ''}}>干物</option>
              <option value="3" {{ Request::get('category') == 3 ? 'selected' : ''}}>魚卵</option>
              <option value="4" {{ Request::get('category') == 4 ? 'selected' : ''}}>丸干し</option>
              <option value="5" {{ Request::get('category') == 5 ? 'selected' : ''}}>珍味</option>
              <option value="6" {{ Request::get('category') == 6 ? 'selected' : ''}}>ちりめん</option>
              <option value="7" {{ Request::get('category') == 7 ? 'selected' : ''}}>うなぎ</option>
            </select>
          </div>

          <!-- ボタン　-->
          <div class="form-btns">
             <button type="submit">検索する</button>
             <a href="{{ route('admin.products')}}" class="all-search-btn">全商品検索</a>
          </div>
        </form>
      </section>
<!------------------------------------------------------------------------------------------------------------------------------------>
      <!-- 右検商品エリア　-->
      <section class="products-contents">
        <!-- 新規ボタン等配置 -->
        <div class="product-btns">
          <a href="{{ route('admin.products_create')}}" class="btn">新規商品登録</a>
          {{ $products->links() }}
        </div>

        <!-- 商品一覧 -->
        @if ( count($products) > 0)
          <ul class="product-lists">
            @foreach ($products as $product)
              <li class="product-list">
                <div class="product-wrepper">
                    <!-- 商品情報ボックス(左エリア) -->
                    <div class="product-datas">
                      <img 
                      src="{{ $product->thumbnail()? asset('storage/products/products'.$product->id.'/'.$product->thumbnail())
                      : asset('image/noimage.png')
                      }}" 
                      alt="商品画像" class="product-img">
                      <div class="info">
                        <strong class="name">{{ $product->name }}</strong>
                        <small class="category">
                          <img src="{{asset('image/tag.png')}}" alt="タグ">
                          {{ $product->getCategory() }}
                        </small>
                        <div class="price"><span>{{ $product->price }}</span>円</div>
                      </div>
                    </div>
                    <!-- 右側エリア -->
                    <div class="product-list-btn">
                      <a href="{{ route('admin.products_show', $product)}}" class="show-btn">商品詳細</a>
                    </div>
                </div>
              </li>    
            @endforeach
          </ul> 
        <!-- *****未登録********* -->
        @else
            <div class="empty">商品が登録されていません。</div> 
        @endif
      </section>
   </article>


@endsection