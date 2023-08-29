<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRボタンページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .shop_name{
        text-align: center;
        font-size :30px;
    }
    .reserve_contents{
        margin : auto;
        width: 1200px;
    }
    </style>
</head>
<body>
    <header>
        <p class="shop_name">{{$reserveData->shop->name}}</p>
        <p class="message">{{session('message')}}</p>
    </header>
    <table class="reserve_contents" border="1">
        <tr>
            <th>日付</th> 
            <th>時間</th>
            <th>人数</th>
            <th>氏名</th>
        </tr>
        <tr>
            <th>{{$reserveData->date}}</th>
            <th>{{$reserveData->time}}</th>
            <th>{{$reserveData->num_of_guest}}人</th>
            <th>{{$reserveData->user->name}}様</th>
        </tr>
    </table>
    <form action ="{{route('enter')}}" method="POST">
            @csrf
                <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reserveData->id}}">
                <button type="submit" class="enter_button">入店する</button>
    </form>
</body>
</html>
