<!-- メインコンテンツ -->
<article class="page-contents">
  <form 
    action="{{ $edit? route('admin.products_update',$product) : route('admin.products_store')}}" 
    class="product-form" enctype="multipart/form-data" method="POST"
  >
    @csrf
    <div class="form-wrapper">
<!--------------------------------------------------------------------------->
        <!-- 左エリア -->
        <section class="image-forms">
            <h4>商品画像登録</h4>

           
            @if ($edit)
                @method('patch')
                @foreach ($product->images()->get() as $i=>$image)
                  <!-- ファイル一覧 -->
                  <div class="files"> 
                    <!-- ファイルインプット -->
                    <div class="file-box" id="box{{ $i + 1}}">
                        <!-- 画像 -->
                        <img src="{{ asset('storage/products/products'.$product->id.'/'.$image->path)}}" alt="画像{{ $i + 1 }}" id="box{{ $i + 1}}-img" class="images">
                        <input type="file" name="file[]" class="file" id="file{{ $i + 1}}" onchange="setImage(event)">
                        <div class="file-wrapper">
                            <span class="file-text" id="text{{ $i + 1 }}">{{ $image->path}}</span>
                            <label for="file{{ $i + 1 }}" class="file-label">写真選択</label>
                        </div>
                    </div>
                </div>    
                @endforeach
                
            @else
                <!-- 追加、削除ボタン -->
                <div class="btns">
                  <button type="button" class="plus" onclick="addInput()">+</button>
                  <button type="button" class="minus" onclick="delInput()">-</button>
                </div>
                <!-- ファイル -->
                <div class="files"> 
                  <div class="file-box" id="box1">
                      <input type="file" name="file[]" class="file" id="file1" onchange="setImage(event)">
                      <div class="file-wrapper">
                          <span class="file-text" id="text1"></span>
                          <label for="file1" class="file-label">写真選択</label>
                      </div>
                  </div>
              </div>
            @endif
        </section>
<!--------------------------------------------------------------------------->
        <!-- 右エリア -->
        <section class="product-forms">
            <h4>商品情報入力</h4>
            <!-- 商品名 -->
            <div class="form-group">
                <div class="form-title">商品名<span class="status">必須</span></div>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name)}}">
            </div>

            <!-- 価格 -->
            <div class="form-group">
                <div class="form-title">商品価格<span class="status">必須</span></div>
                <input type="number" min=1  name="price" class="form-control" value="{{ old('price', $product->price)}}">
            </div>

            <!-- 在庫 -->
            <div class="form-group">
                <div class="form-title">商品在庫<span class="status">任意</span></div>
                <input type="number" min=0  name="stock" class="form-control" value="{{ old('stock', $product->stock)}}">
            </div>

            <!-- カテゴリー -->
            <div class="form-group">
                <div class="form-title">商品カテゴリー<span class="status">必須</span></div>
                <select name="category" class="form-control">
                    <option value="0" {{ old('title',$product->category) == 0 ? 'selected' : ''}}>日替わり商品</option>
                    <option value="1" {{ old('title',$product->category) == 1 ? 'selected' : ''}}>塩鮭</option>
                    <option value="2" {{ old('title',$product->category) == 2 ? 'selected' : ''}}>干物</option>
                    <option value="3" {{ old('title',$product->category) == 2 ? 'selected' : ''}}>魚卵</option>
                    <option value="4" {{ old('title',$product->category) == 2 ? 'selected' : ''}}>丸干し</option>
                    <option value="5" {{ old('title',$product->category) == 3 ? 'selected' : ''}}>うなぎ</option>
                </select>
            </div>

            <!-- 商品説明ー -->
            <div class="form-group">
                <div class="form-title">商品説明<span class="status">任意</span></div>
                <textarea name="info"  cols="30" rows="10" class="form-control textarea">{{ old('info',$product->info)}}</textarea>
            </div>

             <!-- ボタン -->
            <div class="form-btns">
              <button type="submit">{{ $edit? '編集' : '登録'}}</button>
            </div>
        </section>
    </div>
   
  </form>
</article>
