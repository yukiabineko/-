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
                          <!-- 管理者のみステータスと送信ボタンの配置 -->
                          @if (Auth::user()->admin == 1)
                            <div class="contact-statuses">
                              <span class="status">
                                {{ $contact->status == 0? "未返信" : "返信済"}}
                              </span>
                              @if ( $contact->replay == 0)
                                 <button class="replay">返信する</button> 
                              @endif
                            </div>
                          @endif
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