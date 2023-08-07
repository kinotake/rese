<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>評価変更ページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
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
        margin-left : 5vw;
        box-shadow: 3px 3px 3px 0px gray;
        }
    }
    .link{
        display : flex;
        text-decoration: none;
    }
    @media screen and (max-width: 768px) {
    .link{
        width: 100vw;
        height: 12vw;
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
            height: 100vw;;
            width: 90vw;
            padding-right : 4vw;
            padding-left : 4vw;
            padding-top : 4vw;
            padding-bottom : 20vw;
        }
    }
    .content_right{
        background: blue;
        height: 500px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    @media screen and (max-width: 768px) {
    .content_right{
            height: 150vw;
            width: 100vw;
        }
    }
    .reassessment_header{
        color:white;
        padding-top : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    @media screen and (max-width: 768px) {
        .reassessment_header{
            padding-top : 4vw;
            margin-bottom : 4vw;
            margin-left : 6vw;
            font-size : 6vw;
        }
    }
    .updated_at_label{
        margin-left : 175px;
    }
    .assesment_contents{
        background: white;
        height: 170px;
        width: 400px;
        margin:auto;
        background: #0075e8;
        border-radius: 5px;
        display:flex;
    }
    @media screen and (max-width: 768px) {
    .assesment_contents{
        height: 60vw;
        width: 99vw;
        margin-left : 0px;
        }
    }
    .heckle{
        margin-top : 55px;
        text-align: center;
        display:block;
        font-size : 25px;
    }
    .select_value{
        margin-bottom : 15px;
        margin-left : 20px;
    } 
    .label{
        margin-left : 30px;
        color : white;
    }
    @media screen and (max-width: 768px) {
        .label{
            margin-left : 5vw;
            font-size: 5vw;
        }
    }
    .comment_label{
        margin-left : 30px;
        color : white;
        margin-bottom : 70px;
    }
    .comment_value{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .comment_label{
            margin-left : 2vw;
        }
    }
    @media screen and (max-width: 768px) {
        .comment_value{
            font-size: 4vw;;
        }
    }
    .post_content{
        display:flex;
        color : white;
    }
    .post_content_comment{
        color : white;
    }
    .score_value{
        margin-left : 32px;
        display:flex;
    }
    .updated_at_value{
        margin-left : 10px;
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
    .score_contents{
        display:flex;
    }
    .comment{
        height: 80px;
        width: 350px;
        margin-left : 30px;
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
    .error{
        display : inline-block;
        margin-top : 30px;
        margin-left : 30px;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
    }
    @media screen and (max-width: 768px) {
        .shop_photo{
            height: 50vw;
            width: 90vw;
        }
    }
    @media screen and (max-width: 768px) {
        .font,.score_value,.comment_label,.updated_at_label,.updated_at_value,.back{
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
                    <a href="/mypage" class="back"><</a>
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
        <h1 class="reassessment_header">店舗評価の変更</h1>
        <div class="post_content">
            <label for="update_label" class="updated_at_label">投稿時間</label>
            <p id="selectshop" class="updated_at_value">{{$postData->updated_at}}</p>
        </div>
        <aside class="assesment_contents">
            <div class="assesment_content">
                <div class="post_content">
                    <label for="score_label" class="label">Score</label>
                    <div class="score_value">
                    @for ($count = 1; $count <= $postData->score; $count++)
                        <p>★</p>
                    @endfor
                        <p>({{$postData->score}})</p>
                    </div>
                </div>
                <div class="post_content_comment">
                    <label for="comment_label" class="label">Comment</label>
                    <p id="selectshop" class="comment_value">{{$postData->comment}}</p>
                </div>
            </div>
        </aside>
        <form action="/reassessment" method ="POST">
                @csrf
                <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reserveId}}">
                <input type="hidden" name="post_id" class="post_id" id="post_id" value="{{$postData->id}}">
                <div class="score_contents">
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
                </div>
                <div class="input_contents">
                <label for="comment_label" class="comment_label">Comment</label><br>
                <textarea cols="30" rows="5"name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
                </div>
                <button class="form__button" type="submit">評価を変更する</button>
            </form>
    </section>
</body>