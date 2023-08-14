@extends('app')
@section('title')
   注文履歴
@endsection
@section('css')
   <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
   <link rel="stylesheet" href="{{ asset('css/orders/index.css')}}">
@endsection
@section('js')
   <script src="{{ asset('js/jquery.min.js')}}"></script>
   <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
   <script src="{{ asset('js/orders/index.js')}}"></script>
@endsection

@section('contents')
   <div class="page-title">
     <h2>注文履歴</h2>
   </div>

  <!-- メインエリア -->
  <article class="main-contents">
    <p class="supplement">絞り込んで表示したい場合は入力してください。</p>

    <!-- 詳細フォーム -->
    <form action="{{ route('orders.index')}}" method="get">
      <div class="form-box-title">絞り込み</div>
      <div class="order-search-container">
          <!-- 検索ボックス最上段 -->
          <div class="form-first">
              <!-- 検索名前 -->
              <div class="form-group">
                <div class="search-title">名前</div>
                <input type="text" name="name" class="form-control" value="{{Request::get('name')}}">
              </div>

              <!-- 価格検索 -->
              <div class="form-group">
                <div class="search-title">価格</div>
                <input type="number" name="price" class="form-control" value="{{Request::get('price')}}">
              </div>
          </div>
          
          <!-- 二段目 -->
          <div class="form-second">
              <!-- 開始日 -->
              <div class="form-group">
                <div class="search-title">検索開始日</div>
                <input type="text" name="start-date" class="form-control" id="start-date" value="{{Request::get('start-date')}}">
              </div>

              <!-- 終了日 -->
              <div class="form-group">
                <div class="search-title">検索終了日</div>
                <input type="text" name="finish-date" class="form-control" id="finish-date" value="{{Request::get('finish-date')}}">
              </div>
          </div>

           <!-- 検索ボックス最下部 -->
           <div class="form-last">
             <button type="submit" class="btn-submit">検索する</button>
          </div>
      </div>
    </form>



  </article>

   
@endsection