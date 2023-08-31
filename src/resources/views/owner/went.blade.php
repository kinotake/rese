<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力してください</title>
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
    .icon{
        margin-left : 130px;
        box-shadow: 3px 3px 3px 0px gray;
    }
    .rese{
        margin-left : 20px;
        color: #00bfff;
    }
    .shop_header{
        font-size : 30px;
        width: 200px;
        margin-left : 600px;
    }
    .middle_contents{
        display : flex;
        margin-left : 100px;
    }
    .main_link{
        margin-left : 20px;
        font-size : 25px;
    }
    .link{
        text-decoration: none;
        color : grey;
        margin-left : 20px;
        margin-bottom : 20px;
    }
    .qr_button{
        background: #00bfff;
        display : block;
        height: 30px;
        width: 200px;
        color : white;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        padding-top : 5px;
        margin: 0 auto;
        box-shadow: 3px 3px 3px 0px gray;
    }
    .chunk_header{
        padding-top : 20px;
        margin-left : 40px;
    }
    .reserve_contents{
        margin : auto;
        width: 1200px;
    }
    .detail_button{
        background: #00bfff;
        display: inline-block;
        height: 30px;
        width: 150px;
        color : white;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        padding-top : 5px;
        margin-left : 15px;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/owner/menu">
        <img src="{{ asset('/images/owner.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <h2 class="shop_header">{{$shopData->name}}</h2>
    <div class="middle_contents">
        <a href="/owner/reserve/{{$shopData->id}}" type="submit" class="link">これからの予約情報</a>
        <a href="/owner/reserve/today/{{$shopData->id}}" type="submit" class="link">本日の予約情報</a>
        <p class="main_link">過去の予約情報</p>
    </div>
    <a href="/owner/read/qrcode" type="submit" class="qr_button">QRコードの読み取り</a>
    <h3 class="chunk_header">ご来店されなかったお客様</h3>
    <table class="reserve_contents" border="1">
        <tr>
            <th>日付</th> 
            <th>時間</th>
            <th>人数</th>
            <th>氏名</th>
            <th>入店時間</th>
            <th>お問い合わせ</th>
        </tr>
    @if (@isset($reserveDatas))
    @foreach ($reserveDatas as $reserveData)
        <tr>
            <th>{{$reserveData->date}}</th>
            <th>{{$reserveData->time}}</th>
            <th>{{$reserveData->num_of_guest}}人</th>
            <th>{{$reserveData->user->name}}様</th>
            <th>来店前です</th>
            <th><a href="/owner/user/send/{{$reserveData->id}}" type="submit" class="detail_button">お問い合わせ</a></th>
        </tr>
    @endforeach
    @endif
    </table>
    <h3 class="chunk_header">既に来店済みのお客様</h3>
    <table class="reserve_contents" border="1">
        <tr>
            <th>日付</th> 
            <th>時間</th>
            <th>人数</th>
            <th>氏名</th>
            <th>入店時間</th>
            <th>お問い合わせ</th>
        </tr>
    @if (@isset($wentDatas))
    @foreach ($wentDatas as $wentData)
        <tr>
            <th>{{$wentData->date}}</th>
            <th>{{$wentData->time}}</th>
            <th>{{$wentData->num_of_guest}}人</th>
            <th>{{$wentData->user->name}}様</th>
            <th>{{$wentData->enter_at}}</th>
            <th><a href="/owner/user/send/{{$reserveData->id}}" type="submit" class="detail_button">お問い合わせ</a></th>
        </tr>
    @endforeach
    @endif
    </table>
</body>