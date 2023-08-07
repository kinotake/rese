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
    .back_content{
        height: 30px;
        width: 30px;
        box-shadow: 2px 2px 2px 0px gray;
        border-radius: 5px;
        margin-top : 5px;
        margin-bottom : 5px;
        text-align: center;
    }
    @media screen and (max-width: 768px) {
        .back_content{
            height: 6vw;
            width: 6vw;;   
        }
    }
    .back{
        text-decoration: none;
        color :black;
        font-weight : bold;
    }
    .shop_name{
        display:block;
        margin-left : 20px;
    }
    @media screen and (max-width: 768px) {
        .shop_name{
            margin-left : 4vw;
            font-size : 6vw;
        }
    }
    .under_content{
        display:flex;
        justify-content: center;
	    align-items: center;
    }
    @media screen and (max-width: 768px) {
    .under_content{
            display:block;
            margin-left : 0vw;
            padding-top :5vw;
        }
    }
    .shop_header{
        display:flex;
    }
    .content_left{
        height: 450px;
        width: 500px;
        box-shadow: 5px 5px 4px 0px gray;
        padding-right : 20px;
        padding-left : 20px;
        padding-top : 20px;
        padding-bottom : 20px;
        border-radius: 5px;
    }
    @media screen and (max-width: 768px) {
        .content_left{
            height: 90vw;;
            width: 95vw;
            padding-right : 4vw;
            padding-left : 4vw;
            padding-top : 4vw;
            padding-bottom : 20vw;
        }
    }
    .content_right{
        background: blue;
        height: 400px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    @media screen and (max-width: 768px) {
    .content_right{
            height: 70vw;
            width: 100vw;
        }
    }
    .assessment_header{
        color :white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    @media screen and (max-width: 768px) {
        .assessment_header{
            padding-top : 4vw;
            margin-bottom : 4vw;
            margin-left : 6vw;
            font-size : 6vw;
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
    .label{
        color :white;
    }
    @media screen and (max-width: 768px) {
        .label{
            font-size: 5vw;;
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
        color: #ffcc00;
    }
    .rate-form label:hover ~ label {
        color: #ffcc00;
    }
    .rate-form input[type=radio]:checked ~ label {
        color: #ffcc00;
    }
    .comment{
        height: 100px;
        width: 400px;
    }
    @media screen and (max-width: 768px) {
        .comment{
            height: 20vw;
            width: 85vw;
        }
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #0000cd;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
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
    .input_error_message{
        display : block;
        color: white;
        text-align: center;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
    }
    @media screen and (max-width: 768px) {
        .shop_photo{
        height: 60vw;
        width: 95vw;
        }
    }
    @media screen and (max-width: 768px) {
        .font{
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
    <div class="under_content">
        <article class="content_left">
            <div class="shop_header">
                <div class="back_content">
                    <a href="/went" class="back"><</a>
                </div>
                <h1 class="shop_name">{{$shopData->name??''}}</h1>
            </div>
            <div>
                <img src="{{ asset($shopData->getPhoto()) }}"  alt="店内画像" class="shop_photo">
            </div>
            <table>
                <tr>
                    <td class="font">#{{$shopData->place->name??''}}</td>
                    <td class="font">#{{$shopData->category->name??''}}</td>
                </tr>
            </table>
            <p class="font">{{$shopData->comment??''}}</p>
        </article>
        <section class="content_right">
        <h1 class="assessment_header">評価</h1>
        <main class="input_contents">
            <form action="/assessment" method = "POST">
                @csrf
                <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reserveId}}">
                <label for="score_label" class="label">Score</label>
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
                <label for="comment_label" class="label">Comment</label>
                <textarea cols="30" rows="5" name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
        </main>
                <button class="form__button" type="submit">評価する</button>
            </form>
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
        </section>
    </div>
</body>