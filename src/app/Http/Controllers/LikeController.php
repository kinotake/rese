<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function makeLike(Request $request)
    {
        $post = $request->all();
        $selected_shop = $post['shop_id'];
        
        $like = new Like();
        $like->user_id=Auth::id();
        $like->shop_id=$selected_shop;
        $like->save();

        return redirect('/');
    }
    public function deleteLike(Request $request)
    {
        $post = $request->all();
        $selected_shop = $post['shop_id'];
        $who = Auth::id();

        $delete_like = Like::where('user_id','=',$who)->where('shop_id','=',$selected_shop)->first();
        $delete_like->delete();

        return redirect('/');
    }

}