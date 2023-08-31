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
    .links{
        margin-left : 120px;
        display : flex;
    }
    .content_name{
        margin-left : 20px;
        font-weight : bold;
        font-size :25px;
    }
    .link{
        margin-top : 10px;
        margin-left : 25px;
        text-decoration: none;
        color : grey;       
    }
    .owner_contents{
        margin-top : 20px;
        width: 1200px;
        margin-left : 50px;
        margin-bottom : 100px;
    }
    .buttons{
        display : flex;
    }
    .message{
        margin-top : 5px;
        margin-left : 50px; 
        color : red;
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
        margin-left : 5px;
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
    <a href="/administrator/menu">
        <img src="{{asset('/images/adiministrator.png')}}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="message">{{session('message')}}</p>
    </header>
    <nav class="links">
        <p class="content_name">管理店舗一覧</p>
        <a href="/administrator/add" class="link">新規管理者作成</a>
        <a href="/administrator/user/send" class="link">連絡機能</a>
    </nav>
        <table class="owner_contents" border="1">
            <tr>
                <th>店舗管理者名</th> 
                <th>メールアドレス</th>
                <th>管理・メール</th>
            </tr>
            @foreach ($allOwners as $allOwner)
            <tr class="row">
                <td class="name">{{$allOwner->name}}様</td> 
                <td class="email">{{$allOwner->email}}</td>
                <td class="buttons">
                    <a href="administrator/shop/{{$allOwner->id}}" type="submit" class="detail_button">管理店舗</a>
                    <a href="/administrator/owner/send/{{$allOwner->id}}" type="submit" class="mail_button">メールの送信</a>
                </td>
            </tr>
            @endforeach
        </table>
</body>