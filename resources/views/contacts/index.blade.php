@extends('app')
@section('title')
   お問い合わせ一覧
@endsection
@section('css')
   <link rel="stylesheet" href="{{ asset('css/contacts/index.css')}}">
@endsection
@section('js')
   
@endsection

@section('contents')
   <div class="page-title">
     <h2>お問い合わせ一覧</h2>
   </div>

  <!-- メインエリア -->
  <article class="main-contents">
    @if ( count( $contacts ) > 0 )
        
    @else
        <div class="empty">お問い合わせ履歴はありません。</div>
    @endif
    <ul class="contact-lists">
      @foreach ($contacts as $contact)
          <li class="contact-list">
             <div class="contacts-contents">
                <div class="contact-title">{{ $contact->title }}</div>
                <div class="contact-body">
                  {!! nl2br(e( $contact->context )) !!}
                </div>
             </div>
          </li>
      @endforeach
    </ul>
  </article>

@endsection