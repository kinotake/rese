<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Price;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function create($shop_id,$date,$time,$num,$price_id)
    {
        $shopId = $shop_id;
        $priceId = $price_id;

        $priceData = Price::find($priceId);
        $howMuch = $priceData->price * $num;

        return view('payment.create', compact('howMuch','date','time','num','shopId','priceId'));
    }

    public function store(Request $request)
    {

        $selected_num_of_guest = $_POST["num"];
        $selected_price_id = $_POST["price_id"];
        $priceData = Price::find($selected_price_id);

        try
        {
            \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));

            $customer = Customer::create(array(
                'email' => 'test@test.com',
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $priceData->price*$selected_num_of_guest,
                'currency' => 'jpy'
            ));

            $selected_date = $_POST["date"];
            $selected_time = $_POST["time"];
            $selected_shop_id = $_POST["shop_id"];

            $reserve = new Reserve();
            $reserve->date=$selected_date;
            $reserve->time=$selected_time;
            $reserve->num_of_guest=$selected_num_of_guest;
            $reserve->user_id=Auth::id();
            $reserve->shop_id=$selected_shop_id;
            $reserve->save();

            $message = '事前決済及び予約が完了しました。';

            return redirect('/mypage')->with(compact('message'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        
    }
}