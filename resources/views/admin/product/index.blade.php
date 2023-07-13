@extends('admin.app')

@section('css')
   
@endsection

@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
      <h2>商品一覧</h2>
   </div>

   <!-- メインコンテンツ -->
   <article class="main-contents">
<!------------------------------------------------------------------------------------------------------------------------->
      <!-- 左検索エリア　-->
      <section class="search-area">
        <h3>商品検索</h3>
        <p>条件を入力して検索してください</p>
        <form action="{{ route('admin.products')}}" method="get">
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
            <select class="form-control">
              <option value="0" {{ Request::get('category') == 0 ? 'selected' : ''}} >日替わり商品</option>
              <option value="1" {{ Request::get('category') == 1 ? 'selected' : ''}} >干物</option>
              <option value="2" {{ Request::get('category') == 2 ? 'selected' : ''}} >うなぎ</option>
            </select>
          </div>

          <!-- ボタン　-->
          <div class="form-btns">
             <button type="submit">検索する</button>
          </div>
        </form>
      </section>
<!------------------------------------------------------------------------------------------------------------------------------------>
      <!-- 右検商品エリア　-->
      <section class="products-area">
        <!-- 新規ボタン等配置 -->
        <div class="product-btns">
          <a href="{{ route('admin.products_create')}}" class="btn">新規商品登録</a>
        </div>

        <!-- 商品一覧 -->
        @if ( count($products) > 0)
           <table class="table-products">
              <thead>
                <tr>
                  <th></th>
                  <th>商品名</th>
                  <th>価格</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                    <tr>
                      <td>

                      </td>
                      <td>

                      </td>
                      <td>

                      </td>
                      <td>

                      </td>
                    </tr>
                @endforeach
              </tbody>
           </table>
        <!-- *****未登録********* -->
        @else
            <div class="empty">商品が登録されていません。</div> 
        @endif
      </section>
   </article>


@endsection