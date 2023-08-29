<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRコード画面</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .information{
      text-align: center;
    }
    .information_p{
      margin-top: 10px;
      font-size : 25px;
    }
    .reserve_data{
      margin: auto;
    }
    .qrcode{
      margin-top: 100px;
      text-align: center;
    }
    </style>
</head>
<body>
<div class="information">
  <p class="information_p">下のQRコードを店舗の機械に通してください。</p>
  <table class="reserve_data"  border="1" style="border-collapse: collapse">
    <tr>
      <th>お名前</th> 
      <th>店舗名</th>
      <th>日付</th>
      <th>時間</th>
    </tr>
    <tr>
      <td class="name">{{$reserveData->user->name}}様</td> 
      <td class="email">{{$reserveData->shop->name}}</td>
      <td class="email">{{$reserveData->date}}</td>
      <td class="buttons">{{Str::limit($reserveData->time,5,' ')}}～</td>
    </tr>
  </table>
</div>
<div class="qrcode">{!! QrCode::size(200)->generate('owner/reserve/qr/'.$reserveData->id); !!}</div>
</body>