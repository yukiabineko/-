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
                    <img src="{{ asset('image/users/user.svg')}}" alt="ユーザー" class="mobile-item-img">
                    <div class="mobile-user-names">
                        <!-- 通常名前 -->
                        <div class="mobile-item-text">
                          {{ $user->surame }} {{ $user->name }} 
                        </div>
                          <!-- フリガナ -->
                        <div class="mobile-item-kana">
                          {{ $user->surame_kana }} {{ $user->name_kana }} 
                        </div>
                    </div>
                    
                  </div>

                  <!-- 電話番号 -->
                  <div class="mobile-user-tel">
                    <a href="tel:{{ $user->phone_number}}">
                      {{ $user->phone_number }}
                    </a>
                  </div>

                  <!-- メールアドレス -->
                  <div class="mobile-user-email">
                    <a href="mailto:{{ $user->email}}">
                      {{ $user->email }}
                    </a>
                  </div>

                  <!-- 郵便番号 -->
                  <div class="mobile-user-postal_code">
                      {{ $user->postal_code }}
                  </div>

                  <!-- 住所 -->
                  <div class="mobile-user-postal_code">
                    {{ $user->prefectures }}{{ $user->city }}{{ $user->block }}
                  </div>
            </div>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>