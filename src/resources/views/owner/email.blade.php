<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メール作成ページ</title>
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
        background: #00bfff;
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
    .label{
        color : white;
        margin-left : 20px;  
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #00a0e4;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/owner/menu">
        <img src="{{ asset('/images/owner.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <div class ="name_content">
        <p class="user_name">{{$ownerData->name}}さん</p>
    </div>
    <nav class="links">
        <a href="/owner" class="link">管理店舗一覧</a>
        <a href="/owner/add" class="link">新規店舗作成</a>
        <p class="content_name">連絡機能</p>
    </nav>
    
        <div class="all_input_contents">
            <h1 class="shop_header">新規メール作成</h1>
            <main class="input_contents">
                <form action="/owner/send" method = "POST">
                @csrf
                <input type="radio" name="num_of_inq" value="はじめて">はじめて
		        <input type="radio" name="num_of_inq" value="２回目">２回目
		        <input type="radio" name="num_of_inq" value="３回以上">３回以上
                <input type="hidden" name="owner_id" class="owner_id" id="owner_id" value="{{$ownerData->id}}">
                <label for="label" class="label">件名</label>
                <input id="title" type="text" class="form" name="title">
                <div class ="select_contents">
                <label for="label" class="label">コメント</label>
                <textarea cols="30" rows="5" name="content" class="content" id="content">{{ old('content') }}</textarea>
                </div>
            </main>
                <button class="form__button" type="submit">送信する</button>
            </form>
        </div>
</body>