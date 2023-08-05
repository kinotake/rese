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
    .back_content{
        height: 30px;
        width: 30px;
        box-shadow: 2px 2px 2px 0px gray;
        border-radius: 5px;
        margin-top : 5px;
        margin-bottom : 5px;
        text-align: center;
    }
    .back{
        text-decoration: none;
        color :black;
        font-weight : bold;
    }
    .shop_name{
        display:block;
        margin-left : 20px;
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
        position: relative;
    }
    .assessment_header{
        color :white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    .select_contents{
        margin-top : 10px;
    }
    .select_contents_comment{
        margin-top : 10px;
        display:flex;
    }
    .label{
        margin-left : 20px;
        color :white;
        font-size :20px;
    }
    .select_place{
        margin-left : 202px;
    }
    .select_category{
        margin-left : 162px;
    }
    .comment{
        margin-left : 10px;
        width: 250px;
    }
    .num{
        margin-left : 10px;
        width: 200px;
    }
    .image{
        background: white;
    }
    .form__button{
        height: 40px;
        width: 80px;
        background: #0000cd;
        color : white;
        border:none;
        bottom: 0;
        border-radius: 5px;
    }
    .form__button_image{
        margin-left : 0px;
        height: 40px;
        width: 80px;
        background: #0000cd;
        color : white;
        border:none;
        bottom: 0;
        border-radius: 5px;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
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
    <div class="under_content">
    </div>
    <div class="under_content">
        <article class="content_left">
            <div class="shop_header">
                <div class="back_content">
                    <a href="/owner" class="back"><</a>
                </div>
                <h1 class="shop_name">{{$shopData->name??''}}</h1>
            </div>
            <div>
                <img src="{{ asset($shopData->getPhoto()) }}"  alt="店内画像" class="shop_photo">
            </select_contents>
            <table>
                <tr>
                    <td>#{{$shopData->place->name??''}}</td>
                    <td>#{{$shopData->category->name??''}}</td>
                </tr>
            </table>
            <p>{{$shopData->comment??''}}</p>
        </article>
        <section class="content_right">
            <header class="assessment_header">店舗情報の変更</header>
        <main class="">
            <div class="select_contents">
            <form action="/owner/edit/place" method = "POST">
            @csrf
                <label for="label" class="label">エリア</label>
                <input type="hidden" name="num" class="num" id="num" value="{{$shopId}}">
            <select class="select_place" name="place_id">
                    <option value="selected">All area</option>
                    @foreach ($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                    @endforeach
                </select>
            <button class="form__button" type="submit">変更する</button>
            </form>
            </div>
            <div class="select_contents">
            <form action="/owner/edit/category" method = "POST">
            @csrf
                <label for="label" class="label">ジャンル</label>
                <input type="hidden" name="num" class="num" id="num" value="{{$shopId}}">
                <select class="select_category" name="category_id">
                    <option value="selected">All genre</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            <button class="form__button" type="submit">変更する</button>
            </form>
            </div>
            <div class="select_contents">
            <form action="/owner/edit/comment" method = "POST" class="select_contents_comment">
            @csrf
                <label for="label" class="label">コメント</label>
                <input type="hidden" name="num" class="num" id="num" value="{{$shopId}}">
                <textarea cols="30" rows="5" name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
                <button class="form__button" type="submit">変更する</button>
            </form>
            </div>
            <div class="select_contents">
            <form method="POST" action="/owner/upload" enctype="multipart/form-data">
            @csrf
                <label for="label" class="label">画像変更</label>
                <input type="hidden" name="num" class="num" id="num" value="{{$shopId}}">
                <input type="file" value="{{$shopId}}" name="image" class="image">
                <button class="form__button_image">アップロード</button>
            </form>
            </div>
        </main>
                
            
        </section>
    </div>
</body>