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
    .qrcode{
      text-align: center;
    }
    </style>
</head>
<body>
<div class="qrcode">{!! QrCode::size(200)->generate($reserveId); !!}</div>
</body>