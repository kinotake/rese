<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
        [    
            'user_id' => 1,
            'shop_id' => 5,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 7,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 9,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 16,
        ],
        [   
            'user_id' => 1,
            'shop_id' => 18,
        ],
    ]);
    }
}
