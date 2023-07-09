<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

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
    return view('datail', compact('shopData'));
    }
}
// Shop::with('')->first();
