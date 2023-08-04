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
        color: #40e0d0;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/menu/first">
        <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <div class="under_content">
        <p>{{$name}}</p>
        <table class="owner_contents" border="1">
            <tr>
                <th>店舗名</th> 
                <th>カテゴリ</th>
                <th>立地</th>
                <th>最終更新日時</th>
            </tr>
            @foreach ($allShops as $allShop)
            <tr>
                <td class="name">{{$allShop->name}}様</td> 
                <td class="email">ああ</td>
                <td class="num">まだです</td>
                <td>{{$allShop->updated_at}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>