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
    .under_contents{
        display : flex;
        flex-wrap: wrap;
        justify-content: center;
	    align-items: center;
    }
    .shop_information{
        margin-left : 10px;
    }
    .bottons{
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
    .like_error{
        color : red;
    }
    </style>
</head>
<body>
    <header class="top">
    <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    <h1 class="rese">Rese</h1>
    <p class="like_error">{{session('message')}}</p>
    </header>
    <div class="under_contents">
    
    @foreach ($allShops as $allShop)
    
        <div class="shop_content">
            <div class="shop_image">
                <img src="{{ asset('/images/test.png') }}"  alt="店内画像" width="220" height="110">
            </div>
            <table class="shop_information">
            <th>{{$allShop->name}}</th>
            <tr>
                <td>#{{$allShop->place}}</td>
                <td>#{{$allShop->category}}</td>
            </tr>
            </table>
            <div class="bottons">
                <a href="detail/{{$allShop->id}}" type="submit" class="detail_button">詳しく見る</a>
                <div>
                    @if ($allShop->checkLike() == 0)
                    <form method="POST" action="{{route('makeLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">                  
                        <input type="image" src="{{ asset('/images/heart.png') }}" alt="色なしハート" name="heart" width="50" height="50">
                    </form>
                    @else
                    <form method="POST" action="{{route('deleteLike')}}">
                    @csrf
                        <input type="hidden" name="shop_id" id="shop_id" value="{{$allShop->id}}">
                        <input type="image" src="{{ asset('/images/paintedheart.png') }}" alt="色つきハート" name="painted_heart" width="40" height="40">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    
    @endforeach
    
    </div>

    
</body>