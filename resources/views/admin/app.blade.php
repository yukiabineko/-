<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/admin/main.css')}}">
  @yield('css')
  @yield('js')
  
</head>
<body>
  <!-- ヘッダー -->
  @include('admin.header')

  <!-- メインコンテンツ -->
  <main>
    @yield('contents')
  </main>

</body>
</html>