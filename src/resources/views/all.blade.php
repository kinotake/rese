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
        display : flex;
        padding-top : 20px;
        padding-bottom : 20px;
    }
    @media screen and (max-width: 768px) {
    .top{
        display : block;
        margin-left : -60px;
        padding-top : 0px;
        position: fixed;
        height: 18vw;
        width: 120vw;
        background: white;
        }
    }
    .link{
            display : flex;
            text-decoration: none;
        }
    @media screen and (max-width: 768px) {
        .link{
            width: 120vw;
            height: 10vw;
            background: #eeeeee;
        }
    }
    .search_contents{
        margin-left :200px;
        height: 45px;
        width: 700px;
        border-radius: 5px;
        box-shadow: 3px 3px 3px 3px gray;
    }
    @media screen and (max-width: 768px) {
        .search_contents{
            margin-top : 1vw;
            margin-left : 20vw;
            height: 9vw;
            width: 80vw;
        }
    }
    .sort_label{
        margin-top : 8px;
        font-size : 13px;
    }
    .form{
            display : flex;
        }
    @media screen and (max-width: 768px) {
        .form{
            height: 9vw;
            width: 80vw;
        }
    }
    .form_button_contents{
        display : flex;
    }
    @media screen and (max-width: 768px) {
        .form_button_contents{
            width: 51vw;
            height: 8vw;
        }
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
    @media screen and (max-width: 768px) {
        .keyword{
            width: 50vw;
            height: 7vw;
        }
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
        margin-left : 20vw;
        box-shadow: 1vw 1vw 1vw 1vw gray;
        }
    }
    .rese{
        margin-left : 23px;
        color : blue;
    }
    @media screen and (max-width: 768px) {
    .rese{
            margin-left : 4vw;
            font-size: 8vw;
        }
    }
    .rese_contents{
        display : flex;
    }
    @media screen and (max-width: 768px) {
    .under_contents{
            margin-left : -6vw;
        }
    }
    .shop_contents{
        display : flex;
        flex-wrap:wrap;
    }
    @media screen and (max-width: 768px) {
    .shop_contents{
            margin-top : 3vw;
            margin-left : 10vw;
        }
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
            height: 80vw;
            width: 80vw;
            margin-right : 1vw;
            margin-left : 1vw;
        }
    }
    .flex_contents,.under_contents{
        display : flex;
    }
    .star{
        color : gold;
    }
    .no_post{
        font-size : 6px;
    }
    .left_padding_content{
        height: 100%;
        width: 100px;
        flex-shrink: 0;
    }
    @media screen and (max-width: 768px) {
    .left_padding_content{
            height: 100%;
            width: 3vw;
            flex-shrink: 0;
        }
    }
    .shop_information{
        margin-left : 10px;
    }
    @media screen and (max-width: 768px) {
    .information{
            font-size: 6vw;
        }
    }
    @media screen and (max-width: 768px) {
    .name{
            font-size: 6vw;
        }
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
    @media screen and (max-width: 768px) {
    .heart{
            height: 28vw;
            width: 28vw;
            margin-top : -8vw;
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
    @media screen and (max-width: 768px) {
    .shop_photo{
        width : 80vw;
        height : 40vw;
    }
    }
    .searched_data{
        margin-left : 20px;
    }
    @media screen and (max-width: 768px) {
    .searched_data{
        font-size : 4vw;
        margin-left : 5vw;
    }
    }
    .searched_contents{
        margin-left : 100px;
        display : flex;
    }
    @media screen and (max-width: 768px) {
    .searched_contents{
        margin-left : 5vw;
        padding-top : 23vw;
    }
    }
    .a{
        display : flex;
    }
    </style>
</head>
<body>
    <header class="top">
        <div class="rese_contents">
            @if(Auth::check() && Auth::user()->role_id == 3)
            <a href="/administrator/menu" class="link">
                <img src="{{asset('/images/adiministrator.png')}}"  alt="reseのアイコン" width="55" height="55" class="icon">
                <h1 class="rese"><font color=#40e0d0>Rese</font></h1>
            </a>
            @elseif(Auth::check())
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
        </div>
        <div class="search_contents">
            <form action="/search" method = "POST" class="form">
            @csrf
                <label for="sort" class="sort_label">並び替え：</label>
                <select class="select" name="sort" class="sort" id="sort">
                    <option value="random">ランダム</option>
                    <option value="high_score">評価が高い順</option>
                    <option value="low_score">評価が低い順</option>
                </select>
                <select class="select" name="place_id" class="place_id" id="place_id">
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
                <div class="form_button_contents">
                    <button class="form__button" type="submit">
                        <img src="{{ asset('/images/search.png') }}"  alt="探すアイコン" width="25" height="25" class="search_icon">
                    </button>
                    <input type="text" name="keyword" class="keyword" placeholder="Search...">
                </div>
            </form>
        </div>
    </header>
    <p class="error">{{session('message')}}</p>
    <p class="error">{{$noPost??''}}</p>
    <div class="searched_contents">
        <p class="searched_data">検索情報 :</p>
        @if (@isset($sort)&& $sort == "random")
        <p class="searched_data">”ランダム”</p>
        @endif
        @if (@isset($sort)&& $sort == "high_score")
        <p class="searched_data">”評価の高い順”</p>
        @endif
        @if (@isset($sort)&& $sort == "low_score")
        <p class="searched_data">”評価の低い順”</p>
        @endif
        @if (@isset($seachedArea))
        <p class="searched_data">”{{$seachedArea->name}}”</p>
        @endif
        @if (@isset($seachedGenre))
        <p class="searched_data">”{{$seachedGenre->name}}”</p>
        @endif
        @if (@isset($keyword))
        <p class="searched_data">”{{$keyword}}”</p>
        @endif
    </div>
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
            <div class="shop_information">
                <div class="flex_contents">
                    <h2 class="name">{{$allShop->name}}</h2>
                    <p class="star">★</p>
                    @if($allShop->average == null)
                    <p class="no_post">投稿なし</p>
                    @else
                    <p>{{$allShop->average}}</p>
                    @endif
                </div>
                <div class="flex_contents">
                    <p class="information">#{{$allShop->place->name}}</p>
                    <p class="information">#{{$allShop->category->name}}</p>
                </div>
            </div>
            <div class="bottons">
                <a href="detail/{{$allShop->id}}" type="submit" class="detail_button">詳しく見る</a>
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