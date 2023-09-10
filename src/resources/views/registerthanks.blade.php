<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会員登録ありがとうございます</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .icon{
        margin-left : 130px;
        box-shadow: 3px 3px 3px 0px gray;
    }
    @media screen and (max-width: 768px) {
    .icon{
        margin-top : 1vw;
        height: 8vw;
        width: 8vw;
        margin-left : 5vw;
        }
    }
    .link{
        display : flex;
        text-decoration: none;
    }
    @media screen and (max-width: 768px) {
    .link{
        width: 100vw;
        height: 12vw;
        background: #eeeeee;
      }
    }
    .rese{
        margin-left : 20px;
        color: blue;
    }
    .thanks{
        margin: auto;
        margin-top: 100px;
        height: 180px;
        width: 400px;
        box-shadow: 3px 3px 3px 2px gray;
        text-align: center;
        padding-top: 80px;
    }
    @media screen and (max-width: 768px) {
    .thanks{
        margin-top: 30vw;
        width: 80vw;
        height: 40vw;
      }
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
    @media screen and (max-width: 768px) {
      .button{
      font-size : 4vw;
      height: 8vw;;
      width: 20vw;
      }
    }
    @media screen and (max-width: 768px) {
      .comment{
      font-size : 4vw;
      }
    }
    </style>
</head>
<body>
  <header class="rese_contents">
    @if (Auth::check())
    <a href="/menu/first" class="link">
      <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
      <h1 class="rese">Rese</h1>
    </a>
    @else
    <a href="/menu/second" class="link">
      <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
      <h1 class="rese">Rese</h1>
    </a>
    @endif
  </header>
  <article class="thanks">
    <p class="comment">会員登録ありがとうございます</p>
    <a href="/" class="button">戻る</a>
  </article>
</body>
</html>