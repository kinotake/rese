<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','shop_id',];

     public function shop()
    {
      return $this->belongsTo('App\Models\Shop');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
    public function returnCategory()
    {
      $shop_id = $this->shop_id;
      $shop_data = Shop::where('id','=',$shop_id)->first();
      $category_id = $shop_data->category_id;
      $category_data = Category::where('id','=',$category_id)->first();
      $category = $category_data->name;

      return $category;
    }
    public function returnPlace()
    {
      $shop_id = $this->shop_id;
      $shop_data = Shop::where('id','=',$shop_id)->first();
      $place_id = $shop_data->place_id;
      $place_data = Place::where('id','=',$place_id)->first();
      $place = $place_data->name;

      return $place;
    }
    public function getPhoto()
    { 
      if (Photo::where('shop_id','=',$this->shop_id)->exists())
      {
        $photoData = Photo::where('shop_id','=',$this->shop_id)->first();
        $photoPath = $photoData->path;

        return $photoPath;
      }
       else
      {
        $noPhotoPath = '/images/test.png';

        return $noPhotoPath;
      }
    }
}