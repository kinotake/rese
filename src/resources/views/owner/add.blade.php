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
        height: 430px;
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
    .input_error{
        display : block;
        height: 30px;
        width: 350px;
        background: red;
        margin-left : 50px;
        border-radius: 5px;
        margin-top : 2px;
    }
    .input_error_message{
        display : block;
        color: white;
        text-align: center;
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
        <p class="content_name">新規店舗作成（入力）</p>
        <a href="/owner/send" class="link">連絡機能</a>
    </nav>
    <div class="all_input_contents">
        <h1 class="shop_header">新規店舗作成</h1>
        <main class="input_contents">
            <form action="{{ route('makeShop')}}" method = "POST">
            @csrf
                <input type="hidden" name="owner_id" class="owner_id" id="owner_id" value="{{$ownerData->id}}">
                <div class ="select_contents">
                    <label for="label" class="label">新規店舗名</label>
                    <input id="name" type="text" class="form" name="name">
                </div>
                <div class ="select_contents">
                    <label for="label" class="label">エリア</label>
                    <select class="select" name="place_id">
                        <option value="" selected>All area</option>
                        @foreach ($places as $place)
                        <option value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                    </select>
                    <label for="label" class="label_genre">ジャンル</label>
                    <select class="select" name="category_id">
                        <option value="" selected>All genre</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class ="select_contents">
                    <label for="label" class="label_comment">コメント</label>
                    <textarea cols="30" rows="5" name="comment" class="comment" id="comment">{{ old('comment') }}</textarea>
                </div>
                <p class="label_comment">画像は作成後の編集ページからアップロードできます。</p>
                @error('name')
                <span class="input_error">
                    <strong class="input_error_message">{{$errors->first('name')}}</strong>
                </span>
                @enderror
                @error('place_id')
                <span class="input_error">
                    <strong class="input_error_message">{{$errors->first('place_id')}}</strong>
                </span>
                @enderror
                @error('category_id')
                <span class="input_error">
                    <strong class="input_error_message">{{$errors->first('category_id')}}</strong>
                </span>
                @enderror
                @error('comment')
                <span class="input_error">
                    <strong class="input_error_message">{{$errors->first('comment')}}</strong>
                </span>
                @enderror
        </main>
                <button class="form__button" type="submit">作成する</button>
            </form>
    </div>
    <form action="{{ route('postImport') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">CSVファイルを選択（必須）</label>
        <input type='file' name='shop' />
            @error('shop')
                <div class="text-red-500 font-bold">{{ $message }}</div>
            @enderror
        <button type="submit" class='bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 mt-1 rounded'>登録</button>
    </form>
</body>
</html>