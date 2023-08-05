<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
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
