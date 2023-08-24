@extends('admin.app')

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
      <h3>お問い合わせ一覧</h3>
   </div>

   <!-- メインコンテンツ -->
   <article class="main-contents">
      @include('share/contact-list')
   </article>

<!-----------------------------------モーダル開始------------------------------------------------------------------->

  <!--モーダル背景 -->
  <div class="back-ground-layer"></div>

  <!-- モーダル -->
  <div class="modal">
     <!-- モーダルヘッダー　 -->
     <div class="modal-header">
         <div class="modal-header-wrapper">
            <h3>返信作成</h3>
            <button class="close-modal" onclick="closeModal()">x</button>
         </div>
     </div>

     <!-- モーダルボディ -->
     <div class="modal-body">
       <form action="{{ route('admin_contact.replay')}}" method="post" class="replay-form">
         @csrf
         <!-- お客様名 -->
         <div class="form-group">
            <div class="modal-body-title">お客様名</div>
            <div class="record modal-user-name"></div>
         </div>

         <!-- お問合せタイトル -->
         <div class="form-group">
            <div class="modal-body-title">お問合せタイトル</div>
            <div class="record modal-contact-title"></div>
         </div>

         <!-- お問合せ内容 -->
         <div class="form-group">
            <div class="modal-body-title">お問合せ内容</div>
            <div class="record modal-contact-context"></div>
         </div>

         <!-- 返信タイトル -->
         <div class="form-group">
            <div class="modal-body-title">返信タイトル</div>
            <input type="text" name="subject" class="modal-input">
         </div>

         <!-- 返信内容 -->
         <div class="form-group">
            <div class="modal-body-title">返信メッセージ</div>
            <textarea name="replay" class="modal-textarea"></textarea>
         </div>

         <!-- hiddenによる送信先メールアドレス,問い合わせID -->
         <input type="hidden" name="email" class="replay-email">
         <input type="hidden" name="contact_id" class="contact_id">

         <!-- submitボタン -->
         <div class="modal-btn">
            <button type="submit" class="modal-btn-submit">返信する</button>
         </div>

       </form>
     </div>

   </div>
<!-----------------------------------モーダル終了------------------------------------------------------------------->


@endsection