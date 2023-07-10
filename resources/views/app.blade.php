<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/main.css')}}">
  <link rel="stylesheet" href="{{ asset('css/side.css')}}">
  @yield('css')
  @yield('js')
  
</head>
<body>
  <!-- ヘッダー -->
  @include('header')

  <!-- メインコンテンツ -->
  <main>
    @yield('contents')
  </main>

  <!-- フッター -->
  @include('footer')

</body>
</html>