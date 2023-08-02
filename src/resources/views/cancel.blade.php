<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約キャンセルページ</title>
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
        background: white;
        }
    }
    .icon{
        margin-left : 130px;
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
    @media screen and (max-width: 768px) {
    .under_content{
            display:block;
            margin-left : 100px;
            padding-top : 150px;
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
    .content_right{
        background: blue;
        height: 350px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    @media screen and (max-width: 768px) {
    .content_right{
            width: 540px;
        }
    }
    .reserve_header{
        color:white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    .input_contents{
        margin-left : 30px;
    }
    .date{
        height: 25px;
        width: 150px;
        margin-bottom : 10px;
    }
    .time,.num_of_guest{
        height: 25px;
        width: 400px;
        margin-bottom : 10px;
    }
    .select_contents{
        background: white;
        height: 150px;
        width: 400px;
        margin:auto;
        background: #0075e8;
        border-radius: 5px;
        color : white;
    }
    .select_content{
        display:flex;
        margin-top : 5px;
        padding-top : 7px;
    }
    .label{
        margin-left : 30px;
    }
    .select_value{
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
        font-size : 15px;
    }
    @media screen and (max-width: 768px) {
    .form__button{
            width: 540px;
        }
    }
    .error{
        display : inline-block;
        margin-top : 30px;
        margin-left : 30px;
    }
    .login{
        display: inlie-block;
        height: 30px;
        width: 100px;
        text-decoration: none;
        color:white;
    }
    .login_button{
        background: #0000cd;
        height: 30px;
        width: 400px;
        border-radius: 5px;
        text-align: center;
        padding-top : 5px;
        margin-left : 10px;
        margin:auto;
        box-shadow: 2px 2px 2px 0px white;
    }
    .error_contents{
        background: white;
        height: 150px;
        width: 400px;
        border-radius: 5px 5px 0px 0px;
        margin:auto;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
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
                <img src="{{ asset($shopData->getPhoto()) }}"  alt="店内画像" class="shop_photo">
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
        <h1 class="reserve_header">予約のキャンセル</h1>

        <aside class="select_contents">
            <div class="select_content">
                <label for="shop_label" class="label">Shop</label>
                <p id="selectshop" class="select_value">{{$shopData->name??''}}</p>
            </div>
            <div class="select_content">
                <label for="date_label" class="label">Date</label>
                <p id="selectdate" class="select_value">{{$reservedData->date}}</p>
            </div>
            <div class="select_content">
                <label for="time_label" class="label">Time</label>
                <p id="selecttime" class="select_value">{{Str::limit($reservedData->time,5,' ')}}</p>
            </div>
            <div class="select_content">
                <label for="num_label" class="label">Number</label>
                <p id="selectnum" class="select_value">{{$reservedData->num_of_guest}}人</p>
            </div>
        </aside>
            <form action="/cancel" method = "POST">
            @csrf
                <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reservedData->id}}">
                <button class="form__button" type="submit">予約をキャンセルする</button>
            </form>
        </section>
</body>