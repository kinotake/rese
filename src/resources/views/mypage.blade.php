<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>
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
        box-shadow: 1vw 1vw 1vw 0vw gray;
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
    .user_name{
      display:inline-block;
      font-size : 30px;
      margin-left : 620px;
      margin-bottom : 30px;
    }
    @media screen and (max-width: 768px) {
    .user_name{
        margin-left : 5vw;
        font-size : 5vw;
      }
    }
    .header_reserve{
      margin-left :100px;
      font-size : 25px;
    }
    @media screen and (max-width: 768px) {
    .header_reserve{
        margin-left : 20vw;
        font-size : 5vw;
      }
    }
    .link_top{
      display : flex;
      text-decoration: none;
    }
    @media screen and (max-width: 768px) {
      .link_top{
        width: 120vw;
        height: 15vw;
        background: #eeeeee;
      }
    }
    .header_like{
      margin-left :420px;
      font-size : 25px;
    }
    @media screen and (max-width: 768px) {
    .header_like{
        display : none;
        font-size : 3vw;
      }
    }
    .header_like_junp{
      display : none;
    }
    @media screen and (max-width: 768px) {
    .header_like_junp{
        margin-left :2vw;
        display : block;
        font-size : 3vw;
        color: gray;
        text-decoration: none;
        width: 15vw;
        height: 7vw;
      }
    }
    .headers{
      display : flex;
    }
    .under_contents{
      display : flex;
    }
    @media screen and (max-width: 768px) {
      .under_contents{
        display : block;
      }
    }
    .left_content{
      margin-left :100px;
    }
    @media screen and (max-width: 768px) {
      .left_content{
        margin-left :5vw;
      }
    }
    .link{
      color: gray;
      text-decoration: none;
      width: 15vw;
      height: 7vw;
      margin-left : 2vw;;
    }
     @media screen and (max-width: 768px) {
      .link{
        display : block;
        font-size : 3vw;
      }
    }
    .reserved_content{
      width :400px;
      height: 250px;
      background : blue;
      color : white;
      margin-bottom :30px;
      margin-top : 20px;
      box-shadow: 5px 5px 4px 2px gray;
    }
    @media screen and (max-width: 768px) {
      .reserved_content{
        width :90vw;
        height: 50vw;
      }
    }
    .row_contents{
      width :340px;
      height: 180px;
    }
    .row_content{
      display : flex;
      padding-top : 20px;
      margin-left :20px;
    }
    @media screen and (max-width: 768px) {
      .row_content{
        font-size : 4vw;
        padding-top : 3vw;
      }
    }
    .close_icon{
      margin-left :280px;
    }
    .reserved_detail{
      margin-left :80px;
    }
    @media screen and (max-width: 768px) {
      .reserved_detail{
        margin-left :10vw;
      }
    }
    .reserved_guest{
      margin-left :55px;
    }
    @media screen and (max-width: 768px) {
      .reserved_guest{
        margin-left :6vw;
      }
    }
    .schedule_buttons{
      width :200px;
      height: 150px;
      padding-top: 70px;
    }
    @media screen and (max-width: 768px) {
      .schedule_buttons{
        font-size : 4vw;
        padding-top: 0vw;
      }
    }
    .detail_botton_contents{
      display : flex;
    }
    .schedule_button{
      background: #0000cd;
      display: block;
      height: 30px;
      width: 140px;
      color : white;
      border-radius: 5px;
      padding-top :6px;
      margin-top :6px;
      text-decoration: none;
      text-align: center;
    }
    @media screen and (max-width: 768px) {
      .schedule_button{
        height: 10vw;
        width: 35vw;
      }
    }
    .right_contents{
      display : flex;
      flex-wrap: wrap;
      margin-left :100px;
    }
    @media screen and (max-width: 768px) {
    .right_contents{
      margin-left : 7vw;
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
            height: 40vw;
            width: 40vw;
            margin-right : 1vw;
            margin-left : 1vw;
        }
    }
    .buttons{
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
            height: 6vw;
            width: 20vw;
            font-size: 3vw;
        }
    }
    .error_content{
      width :400px;
      height: 250px;
    }
    .error{
      color : red;
    }
    .message{
      display: inline-block;
      margin-left : 100px;
      width :400px;
      height: 40px;
      color : red;
      font-size : 25px;
    }
    .shop_photo{
      width :220px;
      height: 110px;
    }
    @media screen and (max-width: 768px) {
    .shop_photo{
        width : 40vw;
        height : 20vw;
    }
    }
    @media screen and (max-width: 768px) {
    .information{
            font-size: 3vw;
        }
      }
    @media screen and (max-width: 768px) {
    .name{
            font-size: 3vw;
        }
    }
    @media screen and (max-width: 768px) {
    .heart{
            height: 14vw;
            width: 14vw;
            margin-top : -4vw;
        }
    }
    </style>
</head>
<body>
  <header class="rese_contents">
        @if (Auth::check())
        <a href="/menu/first" class="link_top">
            <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
            <h1 class="rese">Rese</h1>
        </a>
        @else
        <a href="/menu/second" class="link_top">
            <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
            <h1 class="rese">Rese</h1>
        </a>
        @endif
    </header>
  <p class="user_name">{{$userData->name}}さん</p>
    <div class="headers">
      <h1 class="header_reserve">予約状況</h1>
      <a href="/went" class="link">来店済み店舗一覧</a>
      <h2 class="header_like">お気に入り店舗</h2>
      <a class="header_like_junp" href="#like_contents">お気に入り店舗一覧</a>
    </div>
    <div class="under_contents">
      <div class="left_content">
      @if ($reserveDatas->isNotEmpty())
      @foreach ($reserveDatas as $reserveData)
      <article class="reserved_content">
        <div class="row_content">
          <img src="{{ asset('/images/time.png') }}"  alt="timeのアイコン" width="20" height="20" class="time_icon">
        <p>予約</p>
        </div>
        <div class="detail_botton_contents">
        <div class="row_contents">
        <div class="row_content">
          <label for="shop_label" class="label">Shop</label>
          <p class="reserved_detail">{{$reserveData->returnName()}}</p>
        </div>
        <div class="row_content">
          <label for="date_label" class="label">Date</label>
          <p class="reserved_detail">{{$reserveData->date}}</p>
        </div>
        <div class="row_content">
          <label for="time_label" class="label">Time</label>
          <p class="reserved_detail">{{ Str::limit($reserveData->time,5,' ') }}</p>
        </div>
        <div class="row_content">
          <label for="num_label" class="label">Number</label>
          <p class="reserved_guest">{{$reserveData->num_of_guest}}人</p>
        </div>
        </div>
        <div class="schedule_buttons">
          <a href="qrcode/{{$reserveData->id}}" type="submit" class="schedule_button">QRコードの発行</a>
          <a href="reschedule/{{$reserveData->shop_id}}/{{$reserveData->id}}" type="submit" class="schedule_button">予約の変更</a>
          <a href="cancel/{{$reserveData->shop_id}}/{{$reserveData->id}}" type="submit" class="schedule_button">予約のキャンセル</a>
        </div>
        </div>
      </article>
      @endforeach
      @else
      <article class="error_content">
        <p class="error">予約データがありません</p>
      </article>
      @endif
      </div>
      <div class="right_contents" id="like_contents">
        @foreach ($likeDatas as $likeData)
        <article class="shop_content">
          <div class="shop_image">
            <img src="{{ asset($likeData->getphoto()) }}"  alt="店内画像" class="shop_photo">
          </div>
          <table class="shop_information">
            <th class="name">{{$likeData->shop->name}}</th>
            <tr>
              <td class="information">#{{$likeData->returnPlace()}}</td>
              <td class="information">#{{$likeData->returnCategory()}}</td>
            </tr>
          </table>
          <div class="buttons">
            <a href="detail/{{$likeData->shop_id}}" type="submit" class="detail_button">詳しく見る</a>
            <div>
              <form method="POST" action="{{route('deleteLike')}}">
                @csrf
                <input type="hidden" name="shop_id" id="shop_id" value="{{$likeData->shop_id}}">
                <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="40" height="40" class="heart">
              </form>
            </div>
          </div>
        </article>
        @endforeach
      </div>
    </div>
</body>