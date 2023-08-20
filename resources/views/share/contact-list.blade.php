@if ( count( $contacts ) > 0 )
        {{ $contacts->links() }}
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