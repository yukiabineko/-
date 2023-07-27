@extends('admin.app')

@section('title')
    お客様一覧
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('css/admin/users/index.css')}}">
@endsection

@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
      <h3>お客様一覧</h3>
   </div>
   @include('share.flash')

   <!-- メインコンテンツ -->
   <article class="main-contents">
      {{ $users->links() }}
     <table class="user-table">
      <thead>
         <tr>
            <th rowspan="2">ID</th>
            <th colspan="4">お名前</th>
            <th rowspan="2">電話番号</th>
            <th rowspan="2">メールアドレス</th>
            <th colspan="4">住所</th>
         </tr>
         <tr>
            <th>氏</th>
            <th>名</th>
            <th>氏(カナ)</th>
            <th>名(カナ)</th>
            <th>郵便番号</th>
            <th>都道府県</th>
            <th>市区町村</th>
            <th>番地等</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }}</td>
               <td>{{ $user->surname }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->surame_kana }}</td>
               <td>{{ $user->name_kana }}</td>
               <td>{{ $user->phone_number }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->postal_code }}</td>
               <td>{{ $user->prefectures }}</td>
               <td>{{ $user->city }}</td>
               <td>{{ $user->block }}</td>
            </tr>    
         @endforeach
      </tbody>
     </table>
   </article>


@endsection