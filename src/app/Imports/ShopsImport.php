<?php

namespace App\Imports;

use App\Models\Shop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;

class ShopsImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Shop([
            'name'=> $row[0],
            'place_id'=> $row[1],
            'category_id'=> $row[2],
            'comment'=> $row[3],
            'user_id'=> Auth::id(),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

}
