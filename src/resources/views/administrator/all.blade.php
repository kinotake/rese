<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者ホーム</title>
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
        color: #40e0d0;
    }
    .container{
        justify-content: center;
        margin: auto;
        box-shadow: 5px 5px 4px 2px gray;
        height: 190px;
        width: 300px;
        border-radius: 5px;
    }
    .card-header{
        border-radius: 5px 5px 0px 0px;
        background: #40e0d0;
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
        background: #40e0d0;
        border : none;
        border-radius: 5px;
    }
    .owner_header{
        margin-left : 50px;
        margin-top : 30px;
        margin-bottom : 5px;
    }
    .owner_contents{
        width: 1200px;
        margin-left : 50px;
        margin-bottom : 100px;
    }
    .buttons{
        width: 250px;
        margin-right : 0px; 
    }
    .message{
        margin-top : 5px;
        margin-left : 50px; 
        color : red;
    }
    .buttons{
        display : flex;
    }
    .detail_button{
        background: #32b39e;
        display: block;
        height: 30px;
        width: 100px;
        color : white;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        padding-top : 5px;
        margin-left : 10px;
    }
    .mail_button{
        background: #40e0d0;
        display: block;
        height: 30px;
        width: 100px;
        color : white;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        padding-top : 5px;
        margin-left : 10px;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="">
        <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="message">{{session('message')}}</p>
    </header>
    <div class="container">
            <div class="card-header">
                <p class="register-header">Owner-Register</p>
            </div>
            <div class="card-body">
                <form action="/administrator/register" method="POST">
                @csrf
                    <div>
                        <img src="{{ asset('/images/person.png') }}"  alt="personのアイコン" width="22" height="22" class="person_icon">
                                <input id="user_name" type="text" class="form" placeholder="UserName" name="user_name">
                    </div>
                    <div>
                        <img src="{{ asset('/images/mail.png') }}"  alt="mailのアイコン" width="20" height="20" class="email_icon">
                                <input id="email" type="email" placeholder="Email" class="form" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
    </div>
        <h2 class="owner_header">店舗管理者一覧</h2>
        <table class="owner_contents" border="1">
            <tr>
                <th>店舗管理者名</th> 
                <th>メールアドレス</th>
                <th>何か</th>
            </tr>
            @foreach ($allOwners as $allOwner)
            <tr class="row">
                <td class="name">{{$allOwner->name}}様</td> 
                <td class="email">{{$allOwner->email}}</td>
                <td class="email">初期ログイン済み</td>
                <td class="buttons">
                    <a href="adiministrator/shop/{{$allOwner->id}}" type="submit" class="detail_button">店舗の管理</a>
                    <a href="" type="submit" class="mail_button">メールの送信</a>
                </td>
            </tr>
            @endforeach
        </table>
</body>