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
        height: 500px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .reserve_header{
        color:white;
        padding-top : 20px;
        margin-left : 30px;
        font-size : 30px;
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
    .comment_label{
        margin-left : 30px;
        color : white;
        margin-bottom : 70px;
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
    .comment_value{
        margin-left : 30px;
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
    .form__button{
        height: 50px;
        width: 450px;
        background: #0000cd;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    .error{
        display : inline-block;
        margin-top : 30px;
        margin-left : 30px;
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
        <p class="like_error">{{session('message')}}</p>
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
        <h1 class="reserve_header">店舗評価の変更</h1>
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
        <form action="" method = "POST">
                @csrf
                <input type="hidden" name="shop_id" class="shop_id" id="shop_id" value="{{$reserveId}}">
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
                <textarea cols="30" rows="5"name="comment" class="comment" id="comment"></textarea>
                </div>
                <button class="form__button" type="submit">評価を変更する</button>
            </form>
    </section>
</body>