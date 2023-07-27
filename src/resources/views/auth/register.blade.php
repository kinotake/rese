<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログインページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .top{
        margin-left : 130px;
        display : flex;
        padding-top : 20px;
        padding-bottom : 20px;
    }
    .icon{
        box-shadow: 3px 3px 3px 0px gray;
    }
    .rese{
        margin-left : 20px;
        color: blue;
    }
    .container{
        margin: auto;
        box-shadow: 5px 5px 4px 2px gray;
        height: 220px;
        width: 300px;
        border-radius: 5px;
    }
    .card-header{
        border-radius: 5px 5px 0px 0px;
        background: blue;
        height: 50px;
        width: 300px;
        color : white;
    }
    .register-header{
        padding-top : 10px;
        margin-left : 25px;
    }
    .form-control{
        margin-top : 10px;
        height: 20px;
        width: 220px;
        border : none;
        border-bottom: 1px solid grey;
    }
    .key_icon,.email_icon,.person_icon{
        display : inline-block;
        padding-top : 10px;
        margin-left : 25px;
    }
    .btn-primary{
        height: 30px;
        width: 70px;
        margin-left : 200px; 
        margin-top : 10px;
        color : white;
        background: blue;
        border : none;
        border-radius: 5px;
    }
    .error-contents{
        margin: auto;
        height: 100px;
        width: 300px;
    }
    .error-message{
        color : red;
    }
    </style>
</head>
<body>
<header class="top">
    @if (Auth::check())
    <a href="/menu/first">
    <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
    @else
    <a href="/menu/second">
    <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
    @endif
    <h1 class="rese">Rese</h1>
</header>
<div class="error-contents">
@error('name')
    <span class="invalid-feedback" role="alert">
        <strong class="error-message">{{ $message }}</strong>
    </span></br>
@enderror
@error('email')
    <span class="invalid-feedback" role="alert">
        <strong class="error-message">{{ $message }}</strong>
    </span></br>
@enderror
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong class="error-message">{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="register-header">{{ __('Register') }}</p>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <img src="{{ asset('/images/person.png') }}"  alt="personのアイコン" width="22" height="22" class="person_icon">
                                <input id="name" type="text" placeholder="Username" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <img src="{{ asset('/images/mail.png') }}"  alt="mailのアイコン" width="20" height="20" class="email_icon">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <img src="{{ asset('/images/key.png') }}"  alt="keyのアイコン" width="20" height="20" class="key_icon">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
