@extends('app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
@endsection

@section('js')
@endsection

@section('contents')
  <div class="container">
    
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


      <div class="card">
        <div class="card-header">パスワード変更手続き</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="main-label">登録時のメールアドレスを入力してください。</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>

                <div class="button-form">
                    <button type="submit" class="btn btn-primary">メールアドレスを送信する</button>
                </div>
                
            </form>
        </div>
      </div>
    </div>
@endsection