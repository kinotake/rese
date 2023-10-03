<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getImage()
    { 
      if (Image::where('post_id','=',$this->id)->exists())
      {
        $photoData = Image::where('post_id','=',$this->id)->first();
        $photoPath = $photoData->path;

        return $photoPath ;
      }
      else
      {
        $noImage = "nothing";

        return $noImage;
      }
    }
    
}