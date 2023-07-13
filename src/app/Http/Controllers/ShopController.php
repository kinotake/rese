<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $allShops = Shop::all();
    
        return view('all', compact('allShops'));
    }

    public function detail($id)
    {
        $shopId = $id;
        $shopData = Shop::where('id',$shopId)->first();
        $check_login = Auth::check();
        
        // 可変（時間）
        $start = 9;
        $end = 22;
        $worktimes = [];
        for ($count = $start; $count <= $end; $count++)
        {

            $zero = "%02d";
            $hours=sprintf($zero, $count);
            $item = $hours.":00";
            $worktimes[] = $item;
        }

        // 可変（人数）
        $min = 1;
        $max = 15;
        $people = [];
        for ($count = $min; $count <= $max; $count++)
        {
            $people[] = $count;
        }

        return view('datail', compact('shopData','worktimes','people','check_login'));
    }
}
