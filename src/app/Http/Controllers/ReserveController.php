<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use Carbon\Carbon;

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
        $reserveDatas = Reserve::where('shop_id','=',$shopId)->whereDate('date','>',$today)->get();
        
        return view('owner/reserve')->with(compact('reserveDatas'));
    }
}
