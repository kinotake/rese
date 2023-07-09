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
        padding-top : 20px;
        padding-bottom : 20px;
    }
    .rese{
        color: blue;
    }
    .under_content{
        display:flex;
        justify-content: center;
	    align-items: center;
    }
    .shop_header{
        display:flex;
    }
    .content_left{
        height: 450px;
        width: 500px;
        box-shadow: 5px 5px 4px 0px gray;
        padding-right : 20px;
        padding-left : 20px;
        padding-top : 20px;
        padding-bottom : 20px;
        border-radius: 5px;
    }
    .content_right{
        background: blue;
        height: 500px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
    }
    .reserve_header{
        color:white;
        padding-left : 30px;
        padding-top : 20px;
    }
    </style>
</head>
<body>
    <header class="top">
    <h1 class="rese">Rese</h1>
    </header>
    <div class="under_content">
    <article class="content_left">
        <div class="shop_header">
        <a href="/"><</a>
        <h1>{{$shopData->name}}</h1>
        </div>
            <div>
                <img src="../../public/images/test.png" alt="店内画像" width="30" height="30">
            </div>
            <table>
            <tr>
                <td>#{{$shopData->place}}</td>
                <td>#{{$shopData->category}}</td>
            </tr>
            </table>
            <p>{{$shopData->comment}}</p>
    </article>
    <div class="content_right">
        <h1 class="reserve_header">予約</h1>
    </div>
    </div>
</body>