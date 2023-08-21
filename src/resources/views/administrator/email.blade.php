<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メール作成ページ（一斉送信）</title>
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
        color : #40e0d0;
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
        background: #40e0d0;
        height: 500px;
        width: 1000px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .all_to_contents{
        display : flex;
    }
    .to_contents{
        display : flex;
    }
    .to_contents{
        height: 25px;
        margin-left : 20px;
        color : white;
    }
    .form{

    }
    .mail_header{
        color : white;
        margin-left : 20px;
    }
    .label{
        color : white;
        margin-left : 20px;  
    }
    .content{
        margin-left : 22px;  
    }
    .title{
        margin-left : 30px; 
        width: 450px;
    }
    .form__button{
        height: 50px;
        width: 1000px;
        background: #32b39e;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    .message{
        color : red;
        margin-left : 20px;
        margin-top : 10px;    
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/administrator/menu">
        <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="message">{{session('message')}}</p>
    </header>
    <nav class="links">
        <a href="/administrator" class="link">管理者一覧</a>
        <a href="/administrator/add" class="link">新規管理者作成</a>
        <p class="content_name">連絡機能</p>
    </nav>
    
        <div class="all_input_contents">
            <h1 class="mail_header">新規メール作成</h1>
            <main class="input_contents">
                <form action="/owner/send" method = "POST">
                @csrf
                <div class ="all_to_contents">
                    <label for="label" class="label">送信先</label>
                    <div class ="to_contents">
                        <p>店舗管理者全員</p>
                    </div>
                </div>
                <label for="label" class="label">件名</label>
                <input id="title" type="text" class="title" name="title">
                <div class ="comment_contents">
                <label for="label" class="label">内容</label>
                <textarea cols="140" rows="22" name="content" class="content" id="content">{{ old('content') }}</textarea>
                </div>
            </main>
                <button class="form__button" type="submit">送信する</button>
            </form>
        </div>
</body>