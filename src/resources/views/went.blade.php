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
    .header_went{
        margin-left : 100px;
    }
    .content_header{
        display : flex;
        padding-top : 15px;
        margin-left : 10px;
    }
    .went_contents{
        display : flex;
        flex-wrap: wrap;
    }
    .reserved_content{
      width :400px;
      height: 250px;
      background : blue;
      color : white ;
      margin-bottom :30px;
      margin-top : 20px;
      box-shadow: 5px 5px 4px 2px gray;
      margin-left : 100px;
    }
    .row_content{
      display : flex;
      padding-top : 20px;
      margin-left :20px;
    }
    .close_icon{
      margin-left :280px;
    }
    .reserved_detail{
      margin-left :80px;
    }
    .reserved_guest{
      margin-left :55px;
    }
    .assessment_button{
      background: #0000cd;
      display: block;
      height: 30px;
      width: 100px;
      color : white;
      border-radius: 5px;
      text-decoration: none;
      text-align: center;
      padding-top : 5px;
      margin-left : 180px;
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
        <h1 class="header_went">来店済み店舗一覧</h1>
    </div>
    <div class="went_contents">
    @if ($wentReserveDatas->isNotEmpty())
      @foreach ($wentReserveDatas as $wentReserveData)
      <article class="reserved_content">
        <div class="content_header">
        <p>来店済み店舗</p>
        <a href="assessment/{{$wentReserveData->id}}" type="submit" class="assessment_button">評価する</a>
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
        <p class="error">来店済みのデータがありません</p>
      </article>
      @endif
    </div>
</body>