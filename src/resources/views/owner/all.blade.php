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
        font-weight : bold;
        font-size :25px;
    }
    .link{
        margin-top : 10px;
        margin-left : 25px;
        text-decoration: none;
        color : grey;       
    }
    .shop_contents{
        display : flex;
        flex-wrap:wrap;
    }
    .shop_content{
        height: 220px;
        width: 220px;
        box-shadow: 5px 5px 4px 2px gray;
        margin-right : 20px;
        margin-left : 20px;
        margin-top : 20px;
        padding-bottom : 20px;
        border-radius: 5px;
    }
    .under_contents{
        display : flex;
    }
    .left_padding_content{
        height: 100%;
        width: 100px;
        flex-shrink: 0;
    }
    .shop_information{
        margin-left : 10px;
    }
    .bottons{
        display : flex;
    }
    .detail_button{
        background: blue;
        display: inline-block;
        height: 30px;
        width: 90px;
        color : white;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        padding-top : 5px;
        margin-left : 15px;
    }
    .message{
        margin-left : 150px;
        color : red;
    }
    .shop_photo{
        width : 220px;
        height : 110px;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/owner/menu">
        <img src="{{ asset('/images/owner.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="message">{{session('message')}}</p>
    </header>
    <div class ="name_content">
        <p class="user_name">{{$ownerData->name}}さん</p>
    </div>
    <nav class="links">
        <p class="content_name">管理店舗一覧</p>
        <a href="/owner/add/{{$ownerData->id}}" class="link">新規店舗作成</a>
        <a href="" class="link">連絡機能</a>
    </nav>
    <main class="under_content">
    <p class="error">{{$noPost??''}}</p>
    <main class="under_contents">
        <div class="left_padding_content">
        </div>
    @if (@isset($allShops))
        <div class="shop_contents">
    @foreach ($allShops as $allShop)
        <article class="shop_content">
            <div class="shop_image">
                <img src="{{ asset($allShop->getPhoto()) }}"  alt="店内画像" class="shop_photo">
            </div>
            <table class="shop_information">
            <th>{{$allShop->name}}</th>
            <tr>
                <td>#{{$allShop->place->name}}</td>
                <td>#{{$allShop->category->name}}</td>
            </tr>
            </table>
            <div class="bottons">
                <a href="owner/edit/{{$allShop->id}}" type="submit" class="detail_button">編集する</a>
                <a href="owner/reserve/{{$allShop->id}}" type="submit" class="detail_button">予約一覧</a>
            </div>
        </article>
    @endforeach
    </div>
    @endif
    
</main>

    
</body>