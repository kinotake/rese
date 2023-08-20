<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use Carbon\Carbon;
use App\Models\Shop;
use Illuminate\Support\Facades\Mail;
use App\Mail\ManyMail;

class ReserveController extends Controller
{
    public function makeReserve(ReserveRequest $request)
    {   
        
        $selected_date = $_POST["date"];
        $selected_time = $_POST["time"];
        $selected_shop_id = $_POST["shop_id"];
        $selected_num_of_guest = $_POST["num_of_guest"];
        
        $reserve = new Reserve();
        $reserve->date=$selected_date;
        $reserve->time=$selected_time;
        $reserve->num_of_guest=$selected_num_of_guest;
        $reserve->user_id=Auth::id();
        $reserve->shop_id=$selected_shop_id;
        $reserve->save();

        return redirect('/done');
        
     }

     public function postReschedule()
    {   
        $selected_date = $_POST["date"];
        $selected_time = $_POST["time"];
        $selected_shop_id = $_POST["shop_id"];
        $selected_num_of_guest = $_POST["num_of_guest"];
        $reserved_id = $_POST["reserve_id"];
        
        $reserve = Reserve::find($reserved_id);
        $reserve->date=$selected_date;
        $reserve->time=$selected_time;
        $reserve->num_of_guest=$selected_num_of_guest;
        $reserve->save();

        $message="予約が変更されました。";

        return redirect('/mypage')->with(compact('message'));
    }
    public function postCancel()
    {   
        $reserved_id = $_POST["reserve_id"];
        
        $reserve = Reserve::find($reserved_id)->delete();

        $message="予約が削除されました。";

        return redirect('/mypage')->with(compact('message'));
    }

    public function getReserve($shop_id)
    {
        $shopId = $shop_id;

        $today = Carbon::now();
        $reserveDatas = Reserve::where('shop_id','=',$shopId)->whereDate('date','>=',$today)->latest('date')->get();

        $shopData = Shop::find($shopId);
        
        return view('owner/reserve')->with(compact('reserveDatas','shopData'));
    }
    public function getReserveToday($shop_id)
    {
        $shopId = $shop_id;

        $today = Carbon::now();
        $reserveDatas = Reserve::where('shop_id','=',$shopId)->whereDate('date','=',$today)->latest('date')->oldest('time')->get();

        $shopData = Shop::find($shopId);
        
        return view('owner/today')->with(compact('reserveDatas','shopData'));
    }

    public function getReserveWent($shop_id)
    {
        $shopId = $shop_id;

        $today = Carbon::now();
        $reserveDatas = Reserve::where('shop_id','=',$shopId)->whereDate('date','<',$today)->latest('date')->get();

        $shopData = Shop::find($shopId);
        
        return view('owner/went')->with(compact('reserveDatas','shopData'));
    }

    public function postSend(Request $request)
    {   
        $content = $request->input('content');
        $title = $request->input('title');
        $shopId = $request->input('shop_id');
        $date = $request->input('date');

        $reserveDatas = Reserve::where('shop_id','=',$shopId)->whereDate('date','=',$date)->get();

        $userDatas = array();
        foreach($reserveDatas as $reserveData)
        {
            $userDatas[] = $reserveData->user->email;
        }
        $unique_emails = array_unique($userDatas);
        
        if($unique_emails == null){

            $message="該当する送信相手が存在しません。";

            return redirect('/owner/send')->with(compact('message'));
        }
        else{

            Mail::to($unique_emails)->send(new ManyMail($content,$title,$unique_emails));

            $message="メールが送信されました。";

        return redirect('/owner/send')->with(compact('message'));

        }
    }

    public function getQr($reserve_id)
    {
        $reserveId = $reserve_id;
        
        return view('qrcode')->with(compact('reserveId'));
    }
}
