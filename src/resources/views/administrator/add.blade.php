<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規店舗作成ページ</title>
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
        color:  #40e0d0;
    }
    .name_content{
        text-align: center;
    }
    .user_name{
        font-size :30px;
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
    .all_input_contents{
        margin-top : 20px;
        margin-left : 140px;
        background:  #40e0d0;
        height: 300px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .shop_header{
        color : white;
        margin-left : 20px;
    }
    .form{
        margin-left : 10px;
        width : 250px;
    }
    .select{
        margin-left : 40px;
    }
    .select_contents{
        margin-top : 20px;
    }
    .mail_label{
        color : white;
        margin-left : 20px;  
    }
    .name_label{
        color : white;
        margin-left : 20px;
        margin-right : 17px;  
    }
    .comment{
        margin-left : 22px;
        width: 280px;
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #32b39e;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/administrator/menu">
        <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <nav class="links">
        <a href="/administrator" class="link">管理店舗一覧</a>
        <p class="content_name">新規管理者作成</p>
        <a href="/administrator/user/send" class="link">連絡機能</a>
    </nav>
    
    <div class="all_input_contents">
        <h1 class="shop_header">新規管理者作成</h1>
        <main class="input_contents">
            <form action="/administrator/register" method="POST">
            @csrf
            <div class ="select_contents">
                <label for="label" class="name_label">新規管理者名</label>
                <input id="user_name" type="text" class="form" name="user_name">
            </div>
            <div class ="select_contents">
                <label for="label" class="mail_label">メールアドレス</label>
                <input id="email" type="email" class="form" name="email">
            </div>
        </main>
        <button class="form__button" type="submit">作成する</button>
            </form>
    </div>
</body>
</html>