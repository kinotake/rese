<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗詳細ページ</title>
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
    .icon{
        box-shadow: 3px 3px 3px 0px gray;
    }
    .rese{
        margin-left : 20px;
        color: blue;
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
    .back{
        text-decoration: none;
        color :black;
        font-weight : bold;
    }
    .shop_name{
        display:block;
        margin-left : 20px;
    }
    .under_content{
        display:flex;
        justify-content: center;
	    align-items: center;
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
    .content_right{
        background: blue;
        height: 400px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .assessment_header{
        color :white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    .input_contents{
        margin-left : 30px;
    }
    .label{
        color :white;
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
    .form__button{
        height: 50px;
        width: 450px;
        background: #0000cd;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
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
                <img src="{{ asset('/images/test.png') }}" alt="店内画像" width="500" height="300">
            </div>
            <table>
                <tr>
                    <td>#{{$shopData->place->name??''}}</td>
                    <td>#{{$shopData->category->name??''}}</td>
                </tr>
            </table>
            <p>{{$shopData->comment??''}}</p>
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
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="score" value="4" id="score">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="score" value="3" id="score">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="score" value="2" id="score">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="score" value="1" id="score">
                    <label for="star1">★</label>
                </div>
                <label for="score_label" class="label">Comment</label>
                <textarea cols="30" rows="5"name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
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