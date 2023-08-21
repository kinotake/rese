<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗管理者メニュー（ログインしています）</title>
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
        background: #00bfff;
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
      color :#00bfff;
      font-size : 30px;
      padding-top: 10px;
    }
    .logout_botton{
        border: none;
        background: white;
        font-size : 30px;
        color :#00bfff;
    }
    </style>
</head>
<body>
<div class="back_content">
  <a href="/owner" class="back">×</a>
</div>
<article class="links">
  <a href="/owner" class="link">Home</a>
  <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById ('logout-form').submit();">
    {{ __('Logout') }}
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
  </form>
</article>
</body>
</html>
