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
    .reserve_header{
        color:white;
        padding-top : 20px;
        margin-bottom : 20px;
        margin-left : 30px;
        font-size : 30px;
    }
    .input_contents{
        margin-left : 30px;
    }
    .date{
        height: 25px;
        width: 150px;
        margin-bottom : 10px;
    }
    .time,.num_of_guest{
        height: 25px;
        width: 400px;
        margin-bottom : 10px;
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
    .select_content{
        display:flex;
        margin-top : 5px;
        padding-top : 7px;
    }
    .label{
        margin-left : 30px;
    }
    .select_value{
        margin-left : 30px;
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
    .error_contents{
        background: white;
        height: 150px;
        width: 400px;
        border-radius: 5px 5px 0px 0px;
        margin:auto;
    }
    </style>
</head>
<body>
    <header class="top">
        <img src="{{ asset('/images/icon.png') }}"  alt="reseのアイコン" width="55" height="55" class="icon">
        <h1 class="rese">Rese</h1>
        <p class="like_error">{{session('message')}}</p>
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
                <img src="{{ asset('/images/test.png') }}" alt="店内画像" width="500" height="300">
            </div>
            <table>
                <tr>
                    <td>#{{$shopData->place??''}}</td>
                    <td>#{{$shopData->category??''}}</td>
                </tr>
            </table>
            <p>{{$shopData->comment??''}}</p>
        </article>
    <section class="content_right">
        <h1 class="reserve_header">予約</h1>
        @if ($check_login == true)
        <main class="input_contents">
            <form action="/detail" method = "POST">
                @csrf
                <input type="hidden" name="shop_id" class="shop_id" id="shop_id" value="{{$shopData->id??''}}">
                <input type="date" id="date" name="date" value="date" class="date" onkeyup="inputCheck()"></br>
                <select name="time" id="time" class="time">
                    @foreach ($worktimes as $worktime)
                    <option value="{{$worktime}}">{{$worktime}}</option>
                    @endforeach
                </select></br>
                <select name="num_of_guest" id="num_of_guest" class="num_of_guest">
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
        </section>
        @else
        <div class="error_contents">
        <p class="error">ログインすると予約機能が利用できます。</p>
        </div>
        <div class="login_button">
        <a href="/login" type="submit" class="login">ログインする</a>
        </div>
        @endif
</body>
