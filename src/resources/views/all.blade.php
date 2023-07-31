<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム</title>
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
    .search_contents{
        margin-left :400px;
        height: 45px;
        width: 450px;
        border-radius: 5px;
        box-shadow: 3px 3px 3px 3px gray;
    }
    .select{
        border: none;
        border-right: 1px solid gray;
    }
    .form__button{
        margin-top:5px;
        border: none;
    }
    .keyword{
        height: 30px;
        width: 250px;
        border: none;
    }
    .icon{
        box-shadow: 3px 3px 3px 0px gray;
    }
    .rese{
        margin-left : 20px;
        color: blue;
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
    @media screen and (max-width: 768px) {
   .shop_content{
            height: 200px;
            width: 200px;
        }
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
    .error{
        margin-left : 150px;
        color : red;
    }
    .shop_photo{
        width : 220px;
        height : 110px;
    }
    @media screen and (max-width: 768px) {
    .shop_photo{
            width : 200px;
            height : 100px;
        }
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
    <div class="search_contents">
    <form action="/search" method = "POST">
    @csrf
    <select class="select" name="place_id">
        <option value="selected">All area</option>
        @foreach ($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
    </select>
    <select class="select" name="category_id">
        <option value="selected">All genre</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button class="form__button" type="submit">
        <img src="{{ asset('/images/search.png') }}"  alt="探すアイコン" width="25" height="25" class="search_icon">
    </button>
    <input type="text" name="keyword" class="keyword" placeholder="Search...">
    </form>
    </div>
    </header>
    <p class="error">{{session('message')}}</p>
    <p class="error">{{$noPost??''}}</p>
    <div class="under_contents">
        <div class="left_padding_content">
        </div>
    @if (@isset($allShops))
        <div class="shop_contents">
    @foreach ($allShops as $allShop)
        <article class="shop_content">
            <div class="shop_image">
                <img src="{{ asset($allShop->getphoto()) }}"  alt="店内画像" class="shop_photo">
            </div>
            <table class="shop_information">
            <th>{{$allShop->name}}</th>
            <tr>
                <td>#{{$allShop->place->name}}</td>
                <td>#{{$allShop->category->name}}</td>
            </tr>
            </table>
            <div class="bottons">
                <a href="detail/{{$allShop->id}}" type="submit" class="detail_button">詳しく見る</a>
                <div>
                    @if ($allShop->checkLike() == 0)
                    <form method="POST" action="{{route('makeLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">                  
                        <input type="image" src="{{ asset('/images/heart.png') }}" alt="色なしハート" name="heart" width="50" height="50">
                    </form>
                    @else
                    <form method="POST" action="{{route('deleteLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">
                        <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="50" height="50">
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