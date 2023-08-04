<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Shop;

class OwnerController extends Controller
{
    public function getOwner(Request $request)
    {
        $allOwners = Owner::all();

        return view('administrator/all', compact('allOwners'));
    }

    public function postOwner(Request $request)
    {
        $post = $request->all();

        $postName = $_POST["user_name"];
        $postEmail = $_POST["email"];
        
        $owner = new Owner();
        $owner->name = $postName;
        $owner->email = $postEmail;
        $owner->save();

        $message = "店舗管理者が追加されました。";

        return redirect('/administrator')->with(compact('message'));
    }

    public function getShop($owner_id)
    {
        $ownerId = $owner_id;
        $allShops =  Shop::where('owner_id',$ownerId)->get();
        $ownerData = Owner::find($ownerId);
        dd($ownerData);
        $name = $ownerData->name;
        
        return view('administrator/shop', compact('allShops','name'));
    }
}
