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