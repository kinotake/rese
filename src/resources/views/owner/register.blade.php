<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力してください</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .top{
        display : flex;
        padding-top : 20px;
        padding-bottom : 20px;
    }
    .icon{
        margin-left : 130px;
        box-shadow: 3px 3px 3px 0px gray;
    }
    .rese{
        margin-left : 20px;
        color: #00bfff;

    }
    .container{
        justify-content: center;
        margin: auto;
        box-shadow: 5px 5px 4px 2px gray;
        height: 230px;
        width: 300px;
        border-radius: 5px;
    }
    .card-header{
        border-radius: 5px 5px 0px 0px;
        background: #00bfff;
        height: 50px;
        width: 300px;
        color : white;
    }
    
    .register-header{
        padding-top : 10px;
        margin-left : 25px;
    }
    .form{
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
        background: #00bfff;
        border : none;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/menu/first">
        <img src="{{ asset('/images/owner.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <div class="under_content">
    </div>
    <div class="container">
            <div class="card-header">
                <p class="register-header">First-Owner-Register</p>
            </div>
            <div class="card-body">
                <form action="/owner/register" method="POST">
                @csrf
                    <div>
                        <img src="{{ asset('/images/person.png') }}"  alt="personのアイコン" width="22" height="22" class="person_icon">
                                <input id="user_name" type="text" class="form" placeholder="UserName" name="user_name">
                    </div>
                    <div>
                        <img src="{{ asset('/images/mail.png') }}"  alt="mailのアイコン" width="20" height="20" class="email_icon">
                                <input id="email" type="email" placeholder="Email(提示済みのメールアドレス）" class="form" name="email">
                    </div>
                    <div>
                        <img src="{{ asset('/images/key.png') }}"  alt="keyのアイコン" width="20" height="20" class="key_icon">
                                <input id="password" type="password" class="form" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">初回登録</button>
                </form>
            </div>
    </div>
</body>