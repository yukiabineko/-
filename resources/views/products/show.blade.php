@extends('app')

@section('css')
    
@endsection

@section('js')
    
@endsection

<!---------------コンテンツ-------------------------------------->
@section('contents')
    <!-- タイトル　-->
    <div class="page-title">
      <h3>{{ $product->name }}詳細</h3>
    </div>

    <!------コンテンツ -->
    <article class="main-contents">
      <!-- 画像エリア -->
      <aside class="image-contents">
        <!-- メインの画像 -->
        <div class="main-img-box">
          <img src="#" alt="main-img" s>
        </div>

        <!-- サブの画像 -->



      </aside>

      <!-- 商品情報エリア -->
      <section class="info-contents"></section>
    </article>
@endsection