<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>来店済み店舗一覧</title>
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
    .user_name{
      display:inline-block;
      font-size : 30px;
      margin-left : 620px;
    }
    .header_went{
      font-size : 25px;
      margin-left : 20px;
    }
    .link{
      text-decoration: none;
      color : grey;
      margin-left : 100px;
    }
    .header_like{
      margin-left :420px;
      font-size : 25px;
    }
    .headers{
      display : flex;
    }
    .under_contents{
      display : flex;
    }
    .left_content{
      margin-left :100px;
    }
    .reserved_content{
      width :400px;
      height: 250px;
      background : blue;
      color : white ;
      margin-bottom :30px;
      margin-top : 20px;
      box-shadow: 5px 5px 4px 2px gray;
    }
    .content_header{
      display : flex;
    }
    .went_content_header{
      padding-top : 20px;
      padding-left :20px;
    }
    .row_content{
      display : flex;
      padding-top : 20px;
      margin-left :20px;
    }
    .assessment_button{
      background: #0000cd;
      display: inline-block;
      height: 30px;
      width: 140px;
      color : white;
      border-radius: 5px;
      padding-top :10px;
      margin-top :6px;
      margin-left :130px;
      text-decoration: none;
      text-align: center;
    }
    .reserved_detail{
      margin-left :80px;
    }
    .reserved_guest{
      margin-left :55px;
    }
    .message{
        display: block;
        margin-left : 180px;
        color : red;
    }
    .right_contents{
      display : flex;
      flex-wrap: wrap;
      margin-left :100px;
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
    .error_content{
      width :400px;
      height: 250px;
    }
    .error{
      color : red;
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
    <p class="message">{{session('message'??'')}}</p>
  </header>
  <p class="user_name">{{$userData->name}}さん</p>
    <div class="headers">
      <a href="/mypage" class="link">予約状況</a>
      <h1 class="header_went">来店済み店舗一覧</h1>
      <h2 class="header_like">お気に入り店舗</h2>
    </div>
    <div class="under_contents">
      <div class="left_content">
      @if ($wentReserveDatas->isNotEmpty())
      @foreach ($wentReserveDatas as $wentReserveData)
      <article class="reserved_content">
        <div class="content_header">
        <p class="went_content_header">来店済み店舗</p>
        @if ($wentReserveData->checkPost() == 0)
        <a href="assessment/{{$wentReserveData->id}}" type="submit" class="assessment_button">評価する</a>
        @else
        <a href="reassessment/{{$wentReserveData->id}}" type="submit" class="assessment_button">編集する</a>
        @endif
        </div>
        <div class="row_content">
          <label for="shop_label" class="label">Shop</label>
          <p class="reserved_detail">{{$wentReserveData->returnName()}}</p>
        </div>
        <div class="row_content">
          <label for="date_label" class="label">Date</label>
          <p class="reserved_detail">{{$wentReserveData->date}}</p>
        </div>
        <div class="row_content">
          <label for="time_label" class="label">Time</label>
          <p class="reserved_detail">{{ Str::limit($wentReserveData->time,5,' ') }}</p>
        </div>
        <div class="row_content">
          <label for="num_label" class="label">Number</label>
          <p class="reserved_guest">{{$wentReserveData->num_of_guest}}人</p>
        </div>
      </article>
      @endforeach
      @else
      <article class="error_content">
        <p class="error">来店済みデータがありません</p>
      </article>
      @endif
      </div>
      <div class="right_contents">
        @foreach ($likeDatas as $likeData)
        <article class="shop_content">
          <div class="shop_image">
            <img src="{{ asset('/images/test.png') }}"  alt="店内画像" width="220" height="110">
          </div>
          <table class="shop_information">
            <th>{{$likeData->shop->name}}</th>
            <tr>
              <td>#{{$likeData->returnPlace()}}</td>
              <td>#{{$likeData->returnCategory()}}</td>
            </tr>
          </table>
          <div class="buttons">
            <a href="detail/{{$likeData->shop_id}}" type="submit" class="detail_button">詳しく見る</a>
            <div>
              <form method="POST" action="{{route('deleteLike')}}">
                @csrf
                <input type="hidden" name="shop_id" id="shop_id" value="{{$likeData->shop_id}}">
                <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="40" height="40">
              </form>
            </div>
          </div>
        </article>
        @endforeach
      </div>
    </div>
</body>