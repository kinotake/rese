<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>タイトルを入力</title>
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
    .reserved_content{
      height: 250px;
      width: 300px;
      background : blue;
      color : white ;
    }
    </style>
</head>
<body>
  <header class="top">
    <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    <h1 class="rese">Rese</h1>
  </header>
  <p>{{$userData->name}}さん</p>
  @foreach ($reserveDatas as $reserveData)
  <article class="reserved_content">
  <label for="shop_label" class="label">Shop</label>
  <p>{{$reserveData->returnName()}}</p>
  <label for="date_label" class="label">Date</label>
  <p>{{$reserveData->date}}</p>
  <label for="time_label" class="label">Time</label>
  <p>{{ Str::limit($reserveData->time,5,' ') }}</p>
  <label for="num_label" class="label">Number</label>
  <p>{{$reserveData->num_of_guest}}人</p>
  </article>
  @endforeach

  @foreach ($likeDatas as $likeData)
  <p>{{$likeData->shop->name}}</p>
  <p>#{{$likeData->returnPlace()}}</p>
  <p>#{{$likeData->returnCategory()}}</p>
  @endforeach
</body>