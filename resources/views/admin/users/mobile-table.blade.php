<table class="mobile-user-table">
  <tbody>
    @foreach ($users as $user)
        <tr>
          <td>
            <div class="mobile-td-wrapper">
                <!-- ID -->
                  <div class="mobile-user-ID">
                    <span class="mobile-item-text">ID: {{ $user->id }}</span>
                  </div>

                  <!-- 名前、カナ -->
                  <div class="mobile-user-name">
                    <img src="{{ asset('image/users/user.svg')}}" alt="ユーザー" class="mobile-name-img">
                    <div class="mobile-name-content">
                        <!-- 通常名前 -->
                        <div class="mobile-item-text">
                          {{ $user->surname }} {{ $user->name }} 
                        </div>
                          <!-- フリガナ -->
                        <div class="mobile-item-kana">
                          {{ $user->surame_kana }} {{ $user->name_kana }} 
                        </div>
                    </div>
                    
                  </div>

                  <!-- 電話番号 -->
                  <div class="mobile-user-tel">
                    <img src="{{ asset('image/users/tel.svg')}}" alt="電話番号" class="mobile-item-img">
                    <a href="tel:{{ $user->phone_number}}" class="mobile-user-link">
                      {{ $user->phone_number }}
                    </a>
                  </div>

                  <!-- メールアドレス -->
                  <div class="mobile-user-email">
                    <img src="{{ asset('image/users/mail.svg')}}" alt="メールアドレス" class="mobile-item-img">
                    <a href="mailto:{{ $user->email}}" class="mobile-user-link">
                      {{ $user->email }}
                    </a>
                  </div>

                  <!-- 郵便番号 -->
                  <div class="mobile-user-postal_code">
                    <img src="{{ asset('image/users/post.svg')}}" alt="郵便番号" class="mobile-item-img">
                    <span class="mobile-item-text">{{ $user->postal_code }}</span>
                  </div>

                  <!-- 住所 -->
                  <div class="mobile-user-postal_code">
                    <img src="{{ asset('image/users/adress.svg')}}" alt="住所" class="mobile-item-img">
                    <span class="mobile-item-text">
                      {{ $user->prefectures }}{{ $user->city }}{{ $user->block }}
                    </span>
                  </div>
            </div>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>