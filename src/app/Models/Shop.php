<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'place_id', 'category_id','comment','user_id'];

    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function reserves()
    {
      return $this->hasMany('App\Models\Reserve');
    }

    public function user()
    {
    return $this->hasManyThrough(User::class,Like::class);
    }

    public function category()
    {
      return $this->belongsTo('App\Models\Category');
    }

    public function place()
    {
      return $this->belongsTo('App\Models\Place');
    }

    // ログインしているユーザがつけている全いいねの取得
    public function checkLike()
    { 
      if (Auth::id() == null)
      {
        $txt ="ログインでいいねが可能です。";

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

    public function getPhoto()
    { 
      if (Photo::where('shop_id','=',$this->id)->exists())
      {
        $photoData = Photo::where('shop_id','=',$this->id)->first();
        $photoPath = $photoData->path;

        return $photoPath;
      }
       else
      {
        $noPhotoPath = '/images/test.png';

        return $noPhotoPath;
      }
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function checkPost()
    { 
      $authority = Auth::user()->role_id;

      if ($authority != 1 || Post::where('user_id','=',Auth::id())->where('shop_id','=',$this->id)->exists())
      {
        $havePost = 1;

        return $havePost;
      }
      else{

        $noPost = 0;

        return $noPost;

      }
    }
}
