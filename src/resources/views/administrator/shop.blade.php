<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗代表者の管理店舗一覧（管理者閲覧用）</title>
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
    .name_header{
        margin-left : 130px;
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
    @media screen and (max-width: 768px) {
    .detail_button{
            height: 12vw;
            width: 40vw;
            font-size: 6vw;
        }
    }
    .error{
        margin-left : 150px;
        color : red;
    }
    .shop_photo{
        width : 220px;
        height : 110px;
    }
    .message{
        margin-top : 5px;
        margin-left : 50px; 
        color : red;
    }
    </style>
</head>
<body>
    <header class="top">
        <a href="/administrator/menu">
            <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
        </a>
        <h1 class="rese">Rese</h1>
        <p class="message">{{$message??''}}</p>
    </header>
    <h2 class="name_header">{{$ownerData->name}}様 管理店舗一覧</h2>
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
                    <th class="name">{{$allShop->name}}</th>
                    <tr>
                        <td class="information">#{{$allShop->place->name}}</td>
                        <td class="information">#{{$allShop->category->name}}</td>
                    </tr>
                </table>
                <div class="bottons">
                    <a href="/detail/{{$allShop->id}}" type="submit" class="detail_button">詳しく見る</a>
                    <div>
                        @if ($allShop->checkLike() == 0)
                        <form method="POST" action="{{route('makeLike')}}">
                        @csrf
                            <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">                  
                            <input type="image" src="{{ asset('/images/heart.png') }}" alt="色なしハート" name="heart" width="50" height="50" class="heart">
                        </form>
                        @else
                        <form method="POST" action="{{route('deleteLike')}}">
                        @csrf
                            <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">
                            <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="50" height="50" class="heart">
                        </form>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>