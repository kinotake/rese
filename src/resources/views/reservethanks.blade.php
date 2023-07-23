<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ご予約ありがとうございます</title>
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
    .thanks{
        height: 180px;
        width: 400px;
        box-shadow: 3px 3px 3px 2px gray;
        text-align: center;
        margin: auto;
        padding-top: 80px;
    }
    .button{
        margin-top :30px;
        display : inline-block;
        text-decoration: none;
        color :black;
        font-weight : bold;
        background : blue;
        color : white;
        height: 25px;
        width: 60px;
        border-radius: 5px;
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
  <article class="thanks">
    <p class ="comment">ご予約ありがとうございます</p>
    <a href="" onclick="window.history.back(); return false;" class="button">戻る</a>
  </article>
</body>