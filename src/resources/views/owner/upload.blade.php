<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗画像のアップロード</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    </style>
</head>
<body>
    <form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
        <input type="text" name="num" class="num" id="num">
        <input type="file" name="image">
        <button>アップロード</button>
    </form>
</body>