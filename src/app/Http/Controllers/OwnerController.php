<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function getOwner(Request $request)
    {
        $allOwners = User::where('role_id','=',2)->get();

        return view('administrator/all', compact('allOwners'));
    }

    public function postOwner(Request $request)
    {
        $post = $request->all();

        $postName = $_POST["user_name"];
        $postEmail = $_POST["email"];
        
        $user = new User();
        $user->name = $postName;
        $user->email = $postEmail;
        $user->password = Hash::make('qwertyui');
        $user->role_id = 2;
        $user->save();

        $message = "店舗管理者が追加されました。";

        return redirect('/administrator')->with(compact('message'));
    }

    public function getShop($user_id)
    {
        $UserId = $owner_id;
        $allShops =  Shop::where('user_id',$UserId)->get();
        $ownerData = User::find($UserId);

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

    public function getAll()
    {
        $ownerId = Auth::id();
        
        $allShops =  Shop::where('user_id','=',$ownerId)->get();
        $ownerData = User::find($ownerId);

        return view('owner/all', compact('allShops','ownerData'));
    }

    public function getEdit($shop_id)
    {
        $shopId = $shop_id;
        $shopData = Shop::where('id',$shopId)->first();

        $categories = Category::all();
        $places = Place::all();
        
        return view('owner/edit', compact('shopData','categories','places','shopId'));
    }

    public function getSend()
    {
        $ownerId = Auth::id();
        $ownerData = User::find($ownerId);
        
        return view('owner/email', compact('ownerData'));
    }
}
