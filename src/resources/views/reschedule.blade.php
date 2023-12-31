<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約変更ページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .link{
        display : flex;
        text-decoration: none;
    }
    @media screen and (max-width: 768px) {
    .link{
        width: 100vw;
        height: 12vw;
        background: #eeeeee;
      }
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
        box-shadow: 3px 3px 3px 0px gray;
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
            margin-left : 4vw;
            font-size : 6vw;
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
            height: 100vw;;
            width: 90vw;
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
            height: 100vw;
            width: 97vw;
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
    .date{
        height: 25px;
        width: 150px;
        margin-bottom : 10px;
    }
    @media screen and (max-width: 768px) {
        .date{
            height: 5vw;
            width: 30vw;
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
            width: 70vw;
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
        display:flex;
    }
    @media screen and (max-width: 768px) {
        .select_contents{
            margin-left: 3vw;
            height: auto;
            width: 90vw;
        }
    }
    .select_content{
        display:flex;
        margin-top : 5px;
    }
    .select_content_center{
        height: 150px;
        width: 40px;
        margin-top : 40px;
    }
    @media screen and (max-width: 768px) {
        .select_content_center{
            height: 15vw;
            width: 5vw;
            margin-top : 5vw;
        }
    }
    .heckle{
        text-align: center;
        display:block;
        font-size : 25px;
    }
    @media screen and (max-width: 768px) {
    .heckle{
            margin-top : 3vw;
            font-size : 5vw;
        }
    }
    .select_content_right{
        padding-top : 7px;
    }
    .select_value{
        margin-bottom : 15px;
        margin-left : 5px;
    }
    .select_value_num{
        margin-bottom : 15px;
        margin-left : 5px;
        margin-top : 8px;
    }
    
    .reserved_value{
        margin-bottom : 10px;
        margin-left : 20px;
    }
    .label{
        margin-left : 30px;
    }
    @media screen and (max-width: 768px) {
        .label{
            margin-left : 5vw;
            font-size: 3vw;
        }
    }
    .form__button{
        height: 30px;
        width: 60px;
        background: #0000cd;
        color : white;
        border:none;
        bottom: 0;
        border-radius: 5px;
        margin-top : 3px;
    }
    @media screen and (max-width: 768px) {
    .form__button{
            height: 7vw;
            width: 15vw;
            font-size : 3vw;
        }
    }
    .error{
        display : inline-block;
        margin-top : 30px;
        margin-left : 30px;
    }
    .shop_photo{
        height: 300px;
        width: 500px;
    }
    @media screen and (max-width: 768px) {
        .shop_photo{
            height: 50vw;
            width: 90vw;
        }
    }
    @media screen and (max-width: 768px) {
        .font,.reserved_value,.heckle,.select_value{
            font-size : 4vw;
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
    @media screen and (max-width: 768px) {
    .input_error{
            height: 5vw;
            width: 80vw;
            font-size : 3vw;
        }
    }
    .input_error_message{
        display : block;
        color: white;
        text-align: center;
    }
    .select_padding{
        height: 33px;
        width: 110px;
    }
    @media screen and (max-width: 768px) {
    .select_padding{
            height: 7vw;
            width: 25vw;
        }
    }
    .select_row_contents{
        display : flex;
    }
    .none_content{
        display : none;
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
                    <a href="/mypage" class="back">
                        <p class="font"><</p>
                    </a>
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
            <h1 class="reserve_header">予約変更</h1>
            <main class="input_contents">
                <form action="/reschedule/date" method="POST" id="date_form">
                    @csrf
                    <input type="hidden" name="shop_id" class="shop_id" id="shop_id" value="{{$shopData->id??''}}">
                    <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reservedData->id}}">
                    <input type="date" id="date" name="date" value="date" class="date" onkeyup="inputCheck()"></br>
                </form>
                <form action="/reschedule/time" method="POST" id="time_form">
                    @csrf
                    <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reservedData->id}}">
                    <select name="time" id="time" class="time">
                        <option value="" selected>選択してください</option>
                        @foreach ($worktimes as $worktime)
                        <option value="{{$worktime}}">{{$worktime}}</option>
                        @endforeach
                    </select></br>
                </form>
                <form action="/reschedule/num" method="POST" id="num_form">
                    @csrf
                    <input type="hidden" name="reserve_id" class="reserve_id" id="reserve_id" value="{{$reservedData->id}}">
                    <select name="num_of_guest" id="num_of_guest" class="num_of_guest">
                        <option value="" selected>選択してください</option>
                        @foreach ($people as $person)
                        <option value="{{$person}}">{{$person}}人</option>
                        @endforeach
                    </select>
                </form>
            </main>
            <aside class="select_contents">
                <div class="select_content_left">
                    <div class="select_content">
                        <label for="shop_label" class="label">Shop</label>
                        <p id="selectshop" class="reserved_value">{{$shopData->name??''}}</p>
                    </div>
                    <div class="select_content">
                        <label for="date_label" class="label">Date</label>
                        <p id="selectshop" class="reserved_value">{{$reservedData->date??''}}</p>
                    </div>
                    <div class="select_content">
                        <label for="time_label" class="label">Time</label>
                        <p id="selectshop" class="reserved_value">{{Str::limit($reservedData->time,5,' ')}}</p>
                    </div>
                    <div class="select_content">
                        <label for="num_label" class="label">Number</label>
                        <p id="selectshop" class="reserved_value">{{$reservedData->num_of_guest??''}}人</p>
                    </div>
                </div>
                <div class="select_content_center">
                    <p class="heckle">→</p>
                    <p class="heckle">→</p>
                    <p class="heckle">→</p>
                </div>
                <div class="select_content_right">
                    <p id="selectshop" class="select_value">{{$shopData->name??''}}</p>
                    <div class="select_row_contents">
                        <div class="select_padding">
                            <p class="none_content">選択なしの空白を作る用のコンテンツです</p>
                            <p id="selectdate" class="select_value"></p>
                        </div>
                        <button class="form__button" type="submit" form="date_form">日付変更</button>
                    </div>
                    <div class="select_row_contents">
                        <div class="select_padding">
                            <p class="none_content">選択なしの空白を作る用のコンテンツです</p>
                            <p id="selecttime" class="select_value"></p>
                        </div>
                        <button class="form__button" type="submit" form="time_form">時間変更</button>
                    </div>
                    <div class="select_row_contents">
                        <div class="select_padding">
                            <p class="none_content">選択なしの空白を作る用のコンテンツです</p>
                            <p id="selectnum" class="select_value_num"></p>
                        </div>
                        <button class="form__button" type="submit" form="num_form">人数変更</button>
                    </div>
                </?div>
            </aside>
            @if (session('error'))
                <span class="input_error">
                    <strong class="input_error_message">{{session('error')}}</strong>
                </span>
            @endif
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
        </section>
</body>
</html>
