@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/form.css')}}">
@endsection

@section('js')
    <script src="{{ asset('js/admin/form.js')}}"></script>
@endsection

@section('contents')
   <div class="page-title">
      <h2>商品登録</h2>
   </div>

   <!-- メインコンテンツ -->
   <article class="page-contents">
     <form action="#" class="product-form" enctype="multipart/form-data" method="POST">
        @csrf
<!--------------------------------------------------------------------------->
        <!-- 左エリア -->
        <section class="image-forms">
           <h4>商品画像登録</h4>

           <!-- 追加、削除ボタン -->
           <div class="btns">
            <button type="button" class="plus">+</button>
            <button type="button" class="minus">-</button>
           </div>

           <!-- ファイル -->
           <div class="files">
             <input type="file" name="file[]" class="file" id="file">
           </div>

        </section>

<!--------------------------------------------------------------------------->
         <!-- 右エリア -->
         <section class="product-forms">
            <!-- 商品名 -->
            <div class="form-group">
                <div class="form-title">商品名</div>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name)}}">
            </div>

             <!-- 価格 -->
             <div class="form-group">
                <div class="form-title">商品価格</div>
                <input type="number" min=1  name="price" class="form-control" value="{{ old('price', $product->price)}}">
             </div>

            <!-- 在庫 -->
            <div class="form-group">
                <div class="form-title">商品在庫</div>
                <input type="number" min=0  name="stock" class="form-control" value="{{ old('stock', $product->stock)}}">
            </div>

            <!-- カテゴリー -->
            <div class="form-group">
                <div class="form-title">商品カテゴリー</div>
                <select name="category" class="form-control">
                    <option value="0" {{ old('title',$product->category) == 0 ? 'selected' : ''}}>日替わり商品</option>
                    <option value="1" {{ old('title',$product->category) == 1 ? 'selected' : ''}}>干物</option>
                    <option value="2" {{ old('title',$product->category) == 2 ? 'selected' : ''}}>うなぎ</option>
                </select>
            </div>

             <!-- 商品説明ー -->
             <div class="form-group">
                <div class="form-title">商品説明</div>
                <textarea name="info"  cols="30" rows="10" class="form-control textare">{{ old('info',$product->info)}}</textarea>
            </div>

            <!-- ボタン -->
            <div class="form-btns">
                <button type="submit">登録</button>
            </div>
         </section>
     </form>
   </article>

@endsection