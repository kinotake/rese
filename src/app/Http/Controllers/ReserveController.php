<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function makeReserve()
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

}
