<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メニュー（ログインしています）</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .back_content{
        height: 30px;
        width: 30px;
        box-shadow: 2px 2px 2px 0px gray;
        border-radius: 5px;
        margin-top : 30px;
        margin-left : 30px;
        text-align: center;
        background: blue;
    }
    .back{
        text-decoration: none;
        color :white;
        font-weight : bold;
    }
    .links{
      margin: auto;
      height: 180px;
      width: 150px;
      text-decoration: none;
      color :black;
      margin-top : 100px;
    }
    .link{
      display : flex;
      text-decoration: none;
      color :blue;
      font-size : 30px;
      padding-top: 10px;
    }
    </style>
</head>
<body>
<div class="back_content">
  <a href="/" class="back">×</a>
</div>
<article class="links">
  <a href="/" class="link">Home</a>
  <a href="" class="link">Logout</a>
  <!-- 要確認↑ -->
  <a href="/mypage" class="link">Mypage</a>
</article>
</body>