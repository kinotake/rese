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
    .header_reserve{
      margin-left :100px;
      font-size : 25px;
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
    <p class="like_error">{{session('message'??'')}}</p>
  </header>
  <p class="user_name">{{$userData->name}}さん</p>
    <div class="headers">
      <h1 class="header_reserve">予約状況</h1>
      <h2 class="header_like">お気に入り店舗</h2>
    </div>
    <div class="under_contents">
      <div class="left_content">
      @if ($reserveDatas->isNotEmpty())
      @foreach ($reserveDatas as $reserveData)
      <article class="reserved_content">
        <div class="row_content">
        <a href="reschedule/{{$reserveData->shop_id}}/{{$reserveData->id}}" type="submit" class="reschedule_button">
          <img src="{{ asset('/images/time.png') }}"  alt="timeのアイコン" width="20" height="20" class="time_icon">
        </a>
        <p>予約</p>
        <img src="{{ asset('/images/close.png') }}"  alt="closeのアイコン" width="20" height="20" class="close_icon">
        </div>
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
      </article>
      @endforeach
      @else
      <article class="error_content">
        <p class="error">予約データがありません</p>
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