<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function shops()
    {
      return $this->hasMany('App\Models\Shop');
    }
    public function shop()
    {
      return $this->belongsTo('App\Models\Shop');
    }
}
