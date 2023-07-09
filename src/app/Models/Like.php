<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
     public function shop()
    {
      return $this->belongsTo('App\Models\Shop');
    }
     public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
    // ログインしているユーザがつけている全いいねの取得
    public function likes()
    {   
        $who = Auth::id();
        $userLikes=Like::where('user_id',$who)->get();
        return $userLikes;
    }
}