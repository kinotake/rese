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
    .shop_content{
        height: 220px;
        width: 220px;
        box-shadow: 5px 5px 4px 0px gray;
        padding-right : 20px;
        padding-left : 20px;
        padding-top : 20px;
        padding-bottom : 20px;
        border-radius: 5px;
    }
    .under_contents{
        display : flex;
        flex-wrap: wrap;
        justify-content: center;
	    align-items: center;
    }
    </style>
</head>
<body>
    <header class="top">
    <h1 class="rese">Rese</h1>
    </header>
    <div class="under_contents">
    
    @foreach ($allShops as $allShop)
    
        <div class="shop_content">
            <div>
                <img src="../../public/images/test.png" alt="店内画像" width="200" height="200">
            </div>
            <table>
            <th>{{$allShop->name}}</th>
            <tr>
                <td>#{{$allShop->place}}</td>
                <td>#{{$allShop->category}}</td>
            </tr>
            </table>
            <a href="detail/{{$allShop->id}}" type="submit">詳しく見る</a>
            <div>
                <p class="content">{{$allShop->checkLike()}}</p>
                @if ($allShop->checkLike() == 0)
                <form method="POST" action="{{route('makeLike')}}">
                @csrf
                    <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">
                    <input type="image" src="../../public/images/heart.png" alt="色なしハート" name="heart">
                </form>
                @else
                <form method="POST" action="{{route('deleteLike')}}">
                @csrf
                    <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">
                    <input type="image" src="../../public/images/paintedheart.png" alt="色つきハート" name="heart">
                </form>
                @endif
            </div>
        </div>
    
    @endforeach
    
    </div>

    
</body>