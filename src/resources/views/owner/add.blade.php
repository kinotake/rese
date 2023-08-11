<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規店舗作成ページ</title>
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
    .name_content{
        text-align: center;
    }
    .user_name{
        font-size :30px;
    }
    .links{
        margin-left : 120px;
        display : flex;
    }
    .content_name{
        margin-left : 20px;
        font-weight : bold;
        font-size :25px;
    }
    .link{
        margin-top : 10px;
        margin-left : 25px;
        text-decoration: none;
        color : grey;       
    }
    .all_input_contents{
        margin-top : 20px;
        margin-left : 140px;
        background: #00bfff;
        height: 300px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    .shop_header{
        color : white;
        margin-left : 20px;
    }
    .form{
        margin-left : 10px;
    }
    .select{
        margin-left : 40px;
    }
    .select_contents{
        margin-top : 20px;
    }
    .label{
        color : white;
        margin-left : 20px;  
    }
    .label_comment{
        color : white;
        margin-left : 20px;
    }
    .label_genre{
        color : white;
        margin-left : 20px;
    }
    .comment{
        margin-left : 22px;
        width: 280px;
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #00a0e4;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
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
    <div class ="name_content">
        <p class="user_name">{{$ownerData->name}}さん</p>
    </div>
    <nav class="links">
        <a href="/owner" class="link">管理店舗一覧</a>
        <p class="content_name">新規店舗作成</p>
        <a href="/owner/send/" class="link">連絡機能</a>
    </nav>
    
        <div class="all_input_contents">
            <h1 class="shop_header">新規店舗作成</h1>
            <main class="input_contents">
                <form action="{{ route('makeShop')}}" method = "POST">
                @csrf
                <input type="hidden" name="owner_id" class="owner_id" id="owner_id" value="{{$ownerData->id}}">
                <div class ="select_contents">
                <label for="label" class="label">新規店舗名</label>
                <input id="new_shop_name" type="text" class="form" name="new_shop_name">
                </div>
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
                <div class ="select_contents">
                <label for="label" class="label_comment">コメント</label>
                <textarea cols="30" rows="5" name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
                </div>
            </main>
                <button class="form__button" type="submit">作成する</button>
            </form>
        </div>
</body>