<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Support\Facades\Hash;

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

        $categories = Category::all();
        $places = Place::all();
        
        return view('administrator/shop', compact('allShops','ownerData','categories','places'));
    }

    public function updateOwner(Request $request)
    {   
        $post = $request->all();
        $postName = $_POST["user_name"];
        $postEmail = $_POST["email"];
        $postPassword = $_POST["password"];
        
        $ownerData = Owner::where('email', '=', $postEmail)->first();
        
        if($ownerData === null)
        {
            $message="メールアドレスが一致しません。";

            return redirect('/owner/register')->with(compact('message'));
        }
        else
        {
            $owner = Owner::find($ownerData->id);
            $owner->name = $postName;
            $owner->password = Hash::make($postPassword);
            $owner->save();

            $message="新規登録が完了しました。";

            return redirect('/owner/login')->with(compact('message'));
        }
    }
}