<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    public function shops()
    {
      return $this->hasMany(Shop::class);
    }

    public function returnShops()
    {
        $shopDatas = Owner::find($this->id)->shops()->where('owner_id',$this->id)->get();
        
        $num = $shopDatas->count();

            return $num;
    
    }
}
