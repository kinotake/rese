<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
    public function shop()
    {
      return $this->belongsTo('App\Models\Shop');
    }
    public function returnName()
    { 
      $shop_id = $this->shop_id;
      $shop_data = Shop::where('id','=',$shop_id)->first();
      $name = $shop_data->name;

      return $name;
    }
     public function checkPost()
    { 
      if (Post::where('shop_id','=',$this->shop_id)->exists())
      {
        $have_post = 1;

        return $have_post;
      }
      else
      {
        $no_post = 0;

        return $no_post;
      }
    }
}
