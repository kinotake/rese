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
    <a href="/menu/first">
        <img src="{{ asset('/images/owner.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <table class="reserve_contents" border="1">
        <tr>
            <th>日付</th> 
            <th>時間</th>
            <th>人数</th>
            <th>氏名</th>
            <th>お問い合わせ</th>
        </tr>
    @if (@isset($reserveDatas))
    @foreach ($reserveDatas as $reserveData)
        <tr>
            <th>{{$reserveData->date}}</th>
            <th>{{$reserveData->time}}</th>
            <th>{{$reserveData->num_of_guest}}人</th>
            <th>{{$reserveData->user->name}}様</th>
            <th><a href="" type="submit" class="detail_button">お問い合わせ</a></th>
        </tr>
    @endforeach
    @endif
    </table>
</body>