@extends('app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/products/show.css')}}">
@endsection

@section('js')
  <script src="{{ asset('js/products/show.js')}}"></script>    
@endsection

<!---------------コンテンツ-------------------------------------->
@section('contents')
    <!------コンテンツ -->
    <article class="main-contents">
<!--------------------------画面上部---------------------------------------------------------------------------->
      <section class="datas">
        <!--左サイドメイン画像 -->
        <img 
          src="{{ asset('storage/products/products'.$product->id.'/'.$product->thumbnail() )}}" 
          alt="メイン画像" class="main-img">

        <!-- 右サイド -->
        <div class="info">
              <!-- 商品名 -->
              <div class="product-name">
                <h3>{{ $product->name }}</h3>
              </div>

              <!--価格　-->
              <div class="price-contents">
                <span class="price-title">価格</span>
                <div class="price">
                  <span class="price-number">{{ $product->price }}</span>円
                </div>
              </div>

            <!--注文数/在庫 -->
            @if (Auth::check() && Auth::user()->admin == 0 && (int)$product->stock > 0)
              <div class="order-contens">
                <span class="oder-title">注文数</span>
                <select  id="select">
                    @for ($i = 0; $i < (int)$product->stock; $i++)
                        <option value="{{ $i}}">{{ $i}}</option>
                    @endfor
                </select>
              </div>
            @else
                <div class="stock">
                  <span class="stock-title">在庫</span>
                  @if ((int)$product->stock != 0)
                    <span class="stock-data"><span class="stock-number">
                      {{ $product->stock  }}
                    </span>個</span>
                  @else
                    <span class="sold-out">売り切れ</span>
                  @endif
                   
                </div>  
            @endif

            <!-- 商品説明 -->
            <div class="description-contents">
              <div class="description-title">商品説明</div>
              <div class="description-text">{!! nl2br(e($product->info)) !!}</div>
            </div>
            

            <!-- ボタンの分岐 -->
            @if(Auth::check() && Auth::user()->admin == 1)
               <div class="admin-btns">
                <a href="#" class="admin-btn edit-button">商品編集</a>
                <form action="#" class="del-form">
                  @csrf
                  <button type="submit" class="admin-btn del-button">削除する</button>
                </form>
               </div>
            @elseif( Auth::check() && Auth::user()-> admin == 0)
               <div class="btns">
                 <button class="btn">買い物かごに入れる</button>
               </div>
            @else
              <div class="btns">
                <a href="{{ route('login')}}" class="btns-button">ログインしてください</a>
              </div>
            @endif
        </div>
      </section>
<!--------------------------画面下部---------------------------------------------------------------------------->
      <section class="images">
         <span class="arrow arrow-left"><<</span>
         <div class="img-wrapper">
          @foreach ($product->images()->get() as $i=>$img)
            @if ($i != 0)
              <img 
                src="{{ asset('storage/products/products'.$img->product_id.'/'.$img->path)}}" 
                alt="画像" class="sub-img" id="img-{{$img->id}}"> 
            @endif
          @endforeach
        </div>
        <span class="arrow arrow-right">>></span>
      </section>
    </article>
@endsection