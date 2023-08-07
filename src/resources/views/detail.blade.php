<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗詳細ページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .icon{
        margin-left : 130px;
        box-shadow: 3px 3px 3px 0px gray;
    }
    @media screen and (max-width: 768px) {
    .icon{
        margin-top : 1vw;
        height: 8vw;
        width: 8vw;
        margin-left : 5vw;
        }
    }
    .rese_contents{
        display : flex;
    }
    .link{
        text-decoration: none;
        display : flex;
    }
    @media screen and (max-width: 768px) {
        .link{
            width: 100vw;
            height: 12vw;
            background: #eeeeee;
        }
    }
    .rese{
        margin-left : 20px;
        color: blue;
    }
    @media screen and (max-width: 768px) {
    .rese{
            margin-left : 4vw;
            font-size: 8vw;
        }
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
    @media screen and (max-width: 768px) {
        .back_content{
            height: 6vw;
            width: 6vw;;   
        }
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
    @media screen and (max-width: 768px) {
        .shop_name{
            margin-left : 5vw;
            font-size : 5vw;
        }
    }
    .under_content{
        display:flex;
        justify-content: center;
	    align-items: center;
    }
    @media screen and (max-width: 768px) {
    .under_content{
            display:block;
            margin-left : 0vw;
            padding-top :5vw;
        }
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
    @media screen and (max-width: 768px) {
        .content_left{
            height: 90vw;;
            width: 95vw;
            padding-right : 4vw;
            padding-left : 4vw;
            padding-top : 4vw;
            padding-bottom : 20vw;
        }
    }
    .content_right{
        background: blue;
        height: 500px;
        width: 450px;
        box-shadow: 5px 5px 4px 0px gray;
        border-radius: 5px;
        position: relative;
    }
    @media screen and (max-width: 768px) {
    .content_right{
            height: 70vw;
            width: 100vw;
            margin-top : 4vw;
        }
    }
    .reserve_header{
        color:white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    @media screen and (max-width: 768px) {
        .reserve_header{
            padding-top : 4vw;
            margin-bottom : 4vw;
            margin-left : 6vw;
            font-size : 6vw;
        }
    }
    .input_contents{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .input_contents{
            margin-left : 6vw;
        }
    }
    .date{
        height: 25px;
        width: 150px;
        margin-bottom : 10px;
    }
    @media screen and (max-width: 768px) {
        .date{
            height: 5vw;
            width: 30vw;
            margin-bottom : 2vw;
        }
    }
    .time,.num_of_guest{
        height: 25px;
        width: 400px;
        margin-bottom : 10px;
    }
    @media screen and (max-width: 768px) {
        .time,.num_of_guest{
            height: 5vw;
            width: 80vw;
            margin-bottom : 2vw;
        }
    }
    .select_contents{
        background: white;
        height: 150px;
        width: 400px;
        margin:auto;
        background: #0075e8;
        border-radius: 5px;
        color : white;
    }
    @media screen and (max-width: 768px) {
        .select_contents{
            height: 40vw;
            width: 90vw;
        }
    }
    .select_content{
        display:flex;
        margin-top : 5px;
        padding-top : 7px;
    }
    @media screen and (max-width: 768px) {
        .select_content{
            margin-top : 1vw;
            padding-top : 2vw;
        }
    }
    .label{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .label{
            margin-left : 6vw;
        }
    }
    .select_value{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .select_value{
            margin-left : 5vw;
        }
    }
    .form__button{
        height: 50px;
        width: 450px;
        background: #0000cd;
        color : white;
        border:none;
        position: absolute;
        bottom: 0;
    }
    @media screen and (max-width: 768px) {
    .form__button{
            height: 10vw;
            width: 100vw;
            font-size : 3vw;
        }
    }
    .error{
        display : inline-block;
        margin-top : 30px;
        margin-left : 30px;
    }
    .login{
        display: inlie-block;
        height: 30px;
        width: 100px;
        text-decoration: none;
        color:white;
    }
    .login_button{
        background: #0000cd;
        height: 30px;
        width: 400px;
        border-radius: 5px;
        text-align: center;
        padding-top : 5px;
        margin-left : 10px;
        margin:auto;
        box-shadow: 2px 2px 2px 0px white;
    }
    @media screen and (max-width: 768px) {
    .login_button{
            height: 10vw;
            width: 100vw;
            font-size : 3vw;
        }
    }
    .error_contents{
        background: white;
        height: 150px;
        width: 400px;
        border-radius: 5px 5px 0px 0px;
        margin:auto;
    }
    @media screen and (max-width: 768px) {
    .error_contents{
            height: 40vw;
            width: 90vw;
        }
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
    .post_header{
        margin-left : 140px;
        margin-top : 30px
    }
    @media screen and (max-width: 768px) {
    .post_header{
            margin-left : 5vw;
            font-size : 7vw;
        }
    }
    .post_contents{
        display:flex;
        margin-left : 130px;
        margin-top : 20px;
        height: 300px;
        width : 1000px;
        overflow-x:auto;
        margin-bottom : 30px;
        border : 1px solid gray;
    }
    @media screen and (max-width: 768px) {
    .post_contents{
            width : 95vw;
            height: 65vw;
            margin-left : 5vw;
            overflow-x:auto;
        }
    }
    .post_content{
        margin-top : 30px;
        box-shadow: 3px 3px 3px 3px gray;
        height: 250px;
        width: 300px;
        margin-left : 30px;
        flex-shrink: 0;
    }
    @media screen and (max-width: 768px) {
        .post_content{
        height: 60vw;
        width: 75vw;
        }
    }
    .star_contents{
        display:flex;
        margin-left : 5px;
        margin-top : 10px;
        margin-bottom : 10px;
    }
    .star{
        color: gold;
    }
    .comment_content{
        margin-left : 5px;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
    }
    @media screen and (max-width: 768px) {
        .shop_photo{
        height: 60vw;
        width: 95vw;
        }
    }
    @media screen and (max-width: 768px) {
        .font,.login,.error,.star{
            font-size : 4vw;
        }
    }
    </style>
</head>
<body>
    <header class="rese_contents">
        @if (Auth::check())
        <a href="/menu/first" class="link">
            <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
            <h1 class="rese">Rese</h1>
        </a>
        @else
        <a href="/menu/second" class="link">
            <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
            <h1 class="rese">Rese</h1>
        </a>
        @endif
    </header>
    <div class="under_content">
        <article class="content_left">
            <div class="shop_header">
                <div class="back_content">
                    <a href="/" class="back"><</a>
                </div>
                <h1 class="shop_name">{{$shopData->name??''}}</h1>
            </div>
            <div>
                <img src="{{ asset($shopData->getPhoto()) }}"  alt="店内画像" class="shop_photo">
            </div>
            <table>
                <tr>
                    <td class="font">#{{$shopData->place->name??''}}</td>
                    <td class="font">#{{$shopData->category->name??''}}</td>
                </tr>
            </table>
            <p class="font">{{$shopData->comment??''}}</p>
        </article>
        <section class="content_right">
            <h1 class="reserve_header">予約</h1>
            @if ($checkLogin == true)
            <main class="input_contents">
                <form action="/detail" method = "POST">
                    @csrf
                    <input type="hidden" name="shop_id" class="shop_id" id="shop_id" value="{{$shopData->id??''}}">
                    <input type="date" id="date" name="date" value="date" class="date" onkeyup="inputCheck()"></br>
                    <select name="time" id="time" class="time">
                        <option value="" selected>選択してください</option>
                        @foreach ($worktimes as $worktime)
                        <option value="{{$worktime}}">{{$worktime}}</option>
                        @endforeach
                    </select></br>
                    <select name="num_of_guest" id="num_of_guest" class="num_of_guest">
                        <option value="" selected>選択してください</option>
                        @foreach ($people as $person)
                        <option value="{{$person}}">{{$person}}人</option>
                        @endforeach
                    </select>
            </main>
            <aside class="select_contents">
                <div class="select_content">
                    <label for="shop_label" class="label">Shop</label>
                    <p id="selectshop" class="select_value">{{$shopData->name??''}}</p>
                </div>
                <div class="select_content">
                    <label for="date_label" class="label">Date</label>
                    <p id="selectdate" class="select_value"></p>
                </div>
                <div class="select_content">
                    <label for="time_label" class="label">Time</label>
                    <p id="selecttime" class="select_value"></p>
                </div>
                <div class="select_content">
                    <label for="num_label" class="label">Number</label>
                    <p id="selectnum" class="select_value"></p>
                </div>
            </aside>
            <script type="text/javascript">
                let date = document.getElementById('date');
                let selectdate = document.getElementById('selectdate');

                timestamp = 0;

                function update(){
	
	                timestamp++;
	                window.requestAnimationFrame(update);
	
	                if (timestamp % 10 == 0 )
                    {
		                selectdate.innerHTML = date.value;
	                }
	
                }

                update();
            </script>
            <script type="text/javascript">
                var time = document.getElementById('time');
                time.addEventListener('change', (event) => {
                var selecttime = document.getElementById('selecttime');
                selecttime.textContent =  time.options[time.selectedIndex].textContent;
                });
            </script>
            <script type="text/javascript">
                var num_of_guest = document.getElementById('num_of_guest');
                num_of_guest.addEventListener('change', (event) => {
                var selectnum = document.getElementById('selectnum');
                selectnum.textContent = num_of_guest.options[num_of_guest.selectedIndex].textContent;
                });
            </script>
                    <button class="form__button" type="submit">予約する</button>
                </form>
            @error('date')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('date')}}</strong>
            </span>
            @enderror
            @error('time')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('time')}}</strong>
            </span>
            @enderror
            @error('num_of_guest')
            <span class="input_error">
                <strong class="input_error_message">{{$errors->first('num_of_guest')}}</strong>
            </span>
            @enderror
        </section>
    </div>
            @else
            <div class="error_contents">
            <p class="error">ログインすると予約機能が利用できます。</p>
            </div>
            <div class="login_button">
            <a href="/login" type="submit" class="login">ログインする</a>
            </div>
        </section>
    </div>
        @endif
<h2 class="post_header">この店の評価</h2>
<article class="post_contents">
@if (@isset($shopPosts))
    @foreach ($shopPosts as $shopPost)
    <div class="post_content">
        <div class="star_contents">
    @for ($count = 1; $count <= $shopPost->score; $count++)
            <p class="star">★</p>
    @endfor
            <p class="font">({{$shopPost->score}})</p>
        </div>
        <div class="comment_content">
            <p class="font">{{$shopPost->comment}}</p>
        </div>
    </div>
    @endforeach
@endif
</article>
</body>