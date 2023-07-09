<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;
    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function user()
    {
    return $this->hasManyThrough(User::class,Like::class);
    }

    // ログインしているユーザがつけている全いいねの取得
    public function checkLike()
    { 
      if (Auth::id() == null)
      {
        $txt ="ログインされていないため、お気に入りの取得ができません。";

        return $txt;
      }
      elseif (Like::where('user_id','=',Auth::id())->where('shop_id','=',$this->id)->exists())
      {
        $have_like = 1;

        return $have_like;
      }
      else
      {
        $no_like = 0;

        return $no_like;
      }
    }
}
// 'App\Model\User', 'App\Order'