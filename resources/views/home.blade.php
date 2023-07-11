@extends('app')
<!-- タイトル -->
@section('title')
    トップページ
@endsection

<!-- css -->
@section('css')
    <link rel="stylesheet" href="{{ asset('css/top.css')}}">
@endsection

<!-- JavaScript -->
@section('js')
  <script src="{{ asset('js/top.js')}}"></script> 
@endsection

<!-- コンテンツ -->
@section('contents')
  <!-- メインビジュアル -->
  <section  class="main-visual">
    <div class="main-visual-wrapper">
      <img src="{{ asset('image/home/main-visual1.png')}}" alt="メインビジュアル1" class="mv-img">
      <img src="{{ asset('image/home/main-visual2.png')}}" alt="メインビジュアル2" class="mv-img">
      <img src="{{ asset('image/home/main-visual3.png')}}" alt="メインビジュアル3" class="mv-img">
    </div>
  </section>
  <!-- コンテンツ -->
  <section class="top-contents">
    <!-- 左サイド -->
    @include('left')

    <!-- 中央メイン -->
    <article class="top-main">

      <!-- 店舗案内 -->
      <section class="shop-info">
        <h2>海鮮について</h2>
        <div class="info-images">
          <img src="{{ asset('image/home/top-item1.jpg')}}" alt="画像1">
          <img src="{{ asset('image/home/top-item2.jpg')}}" alt="画像2">
          <img src="{{ asset('image/home/top-item3.jpg')}}" alt="画像3">
        </div>
        <p class="info-text">
          海鮮は山梨県で日々新鮮な魚介類をお届けするお魚屋さんです。長年様々なお魚を見てきた確かな目利きで、毎朝市場に足を運び納得がいく抜群の鮮度の商品のみを仕入れてお客様に納得していただける商品を販売することを心掛けている魚屋です。
        </p>
      </section>

      <!-- 店舗サービス -->
      <section class="shop-service">
        <h2>お客様のニーズに沿った調理サービス</h2>
        <figure>
          <img src="{{ asset('image/home/top-info1.png')}}" alt="イメージ">
          <figcaption>
            海鮮では、お客様の食卓の献立に合わせて、お魚を調理致します。お刺身、塩焼き用、煮物用、天ぷら用など調理致します。お刺身は柵取まで、その他は無料で調理致しますのでどうぞご利用くださいませ。
          </figcaption>
        </figure>
      </section>

      <!-- オンラインショップ -->
      <section class="online-service">
        <h2>オンラインショップ</h2>
        <figure>
          <img src="{{ asset('image/home/top-info2.png')}}" alt="イメージ">
          <figcaption>
            普段よくご利用いただける商品で、配送が可能な商品は、オンラインショップはいかがでしょうか？
            普段お店で購入して頂いている商品をお店に足を運ぶこと無くご自宅に配送させて頂く便利なサービスなのでぜひこの機会にご利用くださいませ。
          </figcaption>
        </figure>
      </section>




    </article>

     <!-- 右サイド -->
    @include('right')
   
  </section>
@endsection
