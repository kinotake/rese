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
        color: #40e0d0;
    }
    .under_content{
        display : flex;
    }
    .content_left{
        margin-left : 150px;
    }
    .input_contents{
        margin-left : 30px;
    }
    .select_contents{
        display : flex;
        padding-top : 20px;
        padding-bottom : 20px;
    }
    .label{
        color :white;
        font-size :20px;
    }
    .label_genre{
        margin-left : 40px;
        color :white;
        font-size :20px;
    }
    .select{
        margin-left : 30px;
    }
    .form{
        height: 30px;
        width: 400px;
        font-size :20px;
        border : none;
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #32b39e;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    .content_right{
        margin-left : 100px;
        background: #40e0d0;
        height: 300px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .shop_header{
        color :white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    </style>
</head>
<body>
    <header class="top">
    <a href="/menu/first">
        <img src="{{ asset('/images/adiministrator.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
    </a>
        <h1 class="rese">Rese</h1>
        <p class="">{{session('message')}}</p>
    </header>
    <div class="under_content">
        <div class="content_left">
        <h2 class="under_content">{{$ownerData->name}}様 管理店舗一覧</h2>
        <table class="owner_contents" border="1">
            <tr>
                <th>店舗名</th> 
                <th>カテゴリ</th>
                <th>立地</th>
                <th>最終更新日時</th>
            </tr>
            @if (@isset($allShops))
            @foreach ($allShops as $allShop)
            <tr>
                <td class="name">{{$allShop->name}}様</td> 
                <td class="email">ああ</td>
                <td class="num">まだです</td>
                <td>{{$allShop->updated_at}}</td>
            </tr>
            @endforeach
            @endif
        </table>
        </div>
        <section class="content_right">
        <h1 class="shop_header">新規店舗作成</h1>
        <main class="input_contents">
            <form action="{{ route('makeShop')}}" method = "POST">
                @csrf
                <input type="hidden" name="owner_id" class="owner_id" id="owner_id" value="{{$ownerData->id}}">
                <label for="label" class="label">新規店舗名</label>
                <input id="new_shop_name" type="text" class="form" name="new_shop_name">
                <div class ="select_contents">
                <label for="label" class="label">エリア</label>
                <select class="select" name="place_id">
                    <option value="selected">All area</option>
                    @foreach ($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                    @endforeach
                </select>
                <label for="label" class="label_genre">ジャンル</label>
                <select class="select" name="category_id">
                    <option value="selected">All genre</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                </div>
        </main>
                <button class="form__button" type="submit">作成する</button>
            </form>
        </section>
    </div>
</body>