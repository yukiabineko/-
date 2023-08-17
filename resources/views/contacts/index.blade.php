@extends('app')
@section('title')
   お問い合わせ一覧
@endsection
@section('css')
   <link rel="stylesheet" href="{{ asset('css/contacts/index.css')}}">
@endsection
@section('js')
   <script src="{{ asset('js/contacts/index.js')}}"></script>
@endsection

@section('contents')
   <div class="page-title">
     <h2>お問い合わせ一覧</h2>
   </div>

  <!-- メインエリア -->
  <article class="main-contents">
    @if ( count( $contacts ) > 0 )
        <ul class="contact-lists">
          @foreach ($contacts as $contact)
              <li class="contact-list">
                <div class="contacts-contents" id="contents-{{ $contact->id }}">
                  <!-- タイトル -->
                    <div class="contact-title" id="title-{{ $contact->id }}">
                      <span class="title-text">
                        {{ $contact->title }}
                        <div class="date">{{ $contact->created_at }}</div>
                      </span>
                      <span class="open-close">内容を見る</span>
                    </div>
                  <!-- 内容 -->
                    <div class="contact-body" id="body-{{ $contact->id }}" data-status="off">
                      <div class="body-contents">{!! nl2br(e( $contact->context )) !!}</div>
                    </div>
                </div>
              </li>
          @endforeach
        </ul> 
    @else
        <div class="empty">お問い合わせ履歴はありません。</div>
    @endif
   
  </article>

@endsection