<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗評価ページ</title>
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
        margin-left : -60px;
        position: fixed;
        height: 60px;
        width: 1024px;
        background: white;
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
        box-shadow: 3px 3px 3px 0px gray;
        }
    }
    .rese_contents{
        display : flex;
    }
    .link{
        text-decoration: none;
        display : flex;
    }
     @media screen and (max-width: 768px) {
        .link{
            width: 100vw;
            height: 10vw;
            background: #eeeeee;
        }
    }
    .rese{
        margin-left : 20px;
        color: blue;
    }
    @media screen and (max-width: 768px) {
    .rese{
            margin-left : 4vw;
            font-size: 8vw;
        }
    }
    .middle_contents{
        display:flex;
	    align-items: center;
    }
    @media screen and (max-width: 768px) {
    .middle_contents{
            margin-left : 0vw;
            padding-top :5vw;
        }
    }
    .content_left{
        height: 300px;
        width: 400px;
        padding-right : 20px;
        padding-left : 20px;
        margin-top : 20px;
        padding-bottom : 20px;
        margin-left : 200px;
        display:block;
        border-right: solid gray;
    }
    @media screen and (max-width: 768px) {
        .content_left{
            height: 90vw;
            width: 95vw;
            padding-right : 4vw;
            padding-left : 4vw;
            padding-top : 4vw;
            padding-bottom : 20vw;
        }
    }
    .question_contents{
        height: 90px;
        width: 250px;
    }
    .question{
        font-size: 30px;
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
        background: white;
    }
    @media screen and (max-width: 768px) {
    .shop_content{
            height: 80vw;
            width: 80vw;
            margin-right : 1vw;
            margin-left : 1vw;
        }
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
    .content_right{
        height: 400px;
        width: 450px;
        position: relative;
        padding-left : 40px;
    }
    @media screen and (max-width: 768px) {
    .content_right{
            height: 90vw;
            width: 100vw;
        }
    }
    .input_contents{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .input_contents{
            margin-left : 6vw;
        }
    }
    @media screen and (max-width: 768px) {
        .label{
            font-size: 5vw;
        }
    }
    .rate-form {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .rate-form input[type=radio] {
        display: none;
    }
    .rate-form label {
        position: relative;
        padding: 0 5px;
        color: #ccc;
        cursor: pointer;
        font-size: 35px;
    }
    .rate-form label:hover {
        color: blue;
    }
    .rate-form label:hover ~ label {
        color: blue;
    }
    .rate-form input[type=radio]:checked ~ label {
        color: blue;
    }
    .comment{
        height: 100px;
        width: 400px;
    }
    @media screen and (max-width: 768px) {
        .comment{
            height: 20vw;
            width: 85vw;
            font-size : 4vw;
        }
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: c3c2c2;
        border:none;
        bottom: 0;
        border-radius: 50px;
        margin-top : 45px;
        margin-bottom : 45px;
    }
    @media screen and (max-width: 768px) {
    .form__button{
            height: 10vw;
            width: 100vw;
            font-size : 3vw;
        }
    }
    .input_error{
        display : block;
        height: 30px;
        width: 350px;
        background: red;
        margin-left : 50px;
        border-radius: 5px;
        margin-top : 2px;
    }
    @media screen and (max-width: 768px) {
    .input_error{
            height: 5vw;
            width: 80vw;
            font-size : 3vw;
        }
    }
    .input_error_message{
        display : block;
        color: white;
        text-align: center;
    }
    @media screen and (max-width: 768px) {
        .font{
            font-size : 4vw;
        }
    }
    .under_contents{
        text-align:  center; 
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
    <div class="middle_contents">
        <div class="content_left">
            <div class="question_contents">
                <p class="question">今回のご利用はいかがでしたか？</p>
            </div>
            <article class="shop_content">
            <div class="shop_image">
                <img src="{{ asset($shopData->getPhoto()) }}"  alt="店内画像" class="shop_photo">
            </div>
            <table class="shop_information">
                <th class="name">{{$shopData->name}}</th>
                <tr>
                    <td class="information">#{{$shopData->place->name}}</td>
                    <td class="information">#{{$shopData->category->name}}</td>
                </tr>
            </table>
            <div class="bottons">
                <a href="/detail/{{$shopData->id}}" type="submit" class="detail_button">詳しく見る</a>
                <div>
                    @if ($shopData->checkLike() == 0)
                    <form method="POST" action="{{route('makeLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$shopData->id}}">                  
                        <input type="image" src="{{ asset('/images/heart.png') }}" alt="色なしハート" name="heart" width="50" height="50" class="heart">
                    </form>
                    @else
                    <form method="POST" action="{{route('deleteLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$shopData->id}}">
                        <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="50" height="50" class="heart">
                    </form>
                    @endif
                </div>
            </div>
        </article>
        </div>
        <section class="content_right">
                <form action="/assessment" method ="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="shop_id" class="shop_id" id="shop_id" value="{{$shopData->id}}">
                    <label for="score_label" class="label">体験を評価してください</label>
                    <div class="rate-form">
                        <input id="star5" type="radio" name="score" value="5" id="score">
                        <label for="star5" class="font">★</label>
                        <input id="star4" type="radio" name="score" value="4" id="score">
                        <label for="star4" class="font">★</label>
                        <input id="star3" type="radio" name="score" value="3" id="score">
                        <label for="star3" class="font">★</label>
                        <input id="star2" type="radio" name="score" value="2" id="score">
                        <label for="star2" class="font">★</label>
                        <input id="star1" type="radio" name="score" value="1" id="score">
                        <label for="star1" class="font">★</label>
                    </div>
                    <label for="post_header" class="label">見出し</label>
                    <input id="post_header" type="post_header" class="form" name="post_header">
                    <textarea cols="30" rows="5" name="comment" class="comment" id="comment" placeholder="カジュアルな夜におすすめのスポット">{{ old('comment') }}</textarea>
                    <input type="file" name="image" class="image">
            @error('score')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('score')}}</strong>
            </span>
            @enderror
            @error('comment')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('comment')}}</strong>
            </span>
            @enderror
            @error('post_header')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('post_header')}}</strong>
            </span>
            @enderror
            @if (session('error_message'))
                <span class="input_error">
                    <strong class="input_error_message">{{session('error_message')}}</strong>
                </span>
            @endif
        </section>
    </div>
    <div class="under_contents">
    <button class="form__button" type="submit">口コミを投稿</button>
                </form>
    </div>
</body>
</html>