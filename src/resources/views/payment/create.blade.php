<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>決済用ページ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />

    <style>
    *{
      margin: 0;
      padding: 0;
    }
    .container{
        border : 1px solid #000;
        width : 300px;
        height: 230px;
        margin : 0 auto;
        margin-top : 10vw;
    }
    .card_header{
        margin-top : 5px;
        margin-left : 10px;
    }
    .payment_data{
        margin-left : 50px;
        margin-top : 5px;
    }
    .payment_btn{
        margin-top : 50px;
        background : blue;
        border : none;
        color : white;
        width : 302px;
        height: 30px;
    }
    </style>
</head>
<body>
<div class="container">
    @if (session('flash_alert'))
        <div class="error">{{ session('flash_alert') }}</div>
    @elseif(session('status'))
        <div class="success">
            {{ session('status') }}
        </div>
    @endif
    <div class="payment_datas">
        <div class="card_header">Stripe決済</div>
        <div class="card_body">
            <form id="card_form" action="{{route('payment.store')}}" method="POST">
                @csrf
                <div class="payment_data">
                    <label for="card_number">カード番号</label>
                    <div id="card-number" class="form-control"></div>
                </div>
                <div class="payment_data">
                    <label for="card_expiry">有効期限</label>
                    <div id="card-expiry" class="form-control"></div>
                </div>
                <div class="payment_data">
                    <label for="card_cvc">セキュリティコード</label>
                    <div id="card-cvc" class="form-control"></div>
                </div>
                <div id="card-errors" class="text-danger"></div>
                <button class="payment_btn">支払い</button>
            </form>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe_public_key = "{{ config('stripe.stripe_public_key') }}"
    const stripe = Stripe(stripe_public_key);
    const elements = stripe.elements();

    var cardNumber = elements.create('cardNumber');
    cardNumber.mount('#card-number');
    cardNumber.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var cardExpiry = elements.create('cardExpiry');
    cardExpiry.mount('#card-expiry');
    cardExpiry.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var cardCvc = elements.create('cardCvc');
    cardCvc.mount('#card-cvc');
    cardCvc.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('card-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        var errorElement = document.getElementById('card-errors');
        if (event.error) {
            errorElement.textContent = event.error.message;
        } else {
            errorElement.textContent = '';
        }

        stripe.createToken(cardNumber).then(function(result) {
            if (result.error) {
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('card-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
</body>
</html>

