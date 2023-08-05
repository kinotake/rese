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
        justify-content: space-between;
    }
    .detail_button{
        background: blue;
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
    <div class="under_content">
    <p class="error">{{$noPost??''}}</p>
    <div class="under_contents">
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
            </div>
        </article>
    @endforeach
    </div>
    @endif
    
    </div>

    
</body>
    </div>
</body>