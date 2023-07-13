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
      <!-- 左検索エリア　-->
      <section class="search-area">
        <h3>商品検索</h3>
        <p>条件を入力して検索してください</p>
        <form action="{{ route('admin.products')}}" method="get">
          
        </form>
      </section>
<!------------------------------------------------------------------>
      <!-- 右検商品エリア　-->
      <section class="products-area">

      </section>
   </article>


@endsection