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
        [    
            'user_id' => 2,
            'shop_id' => 1,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 5,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 7,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 8,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 9,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 13,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 4,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 8,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 9,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 10,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 13,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 4,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 5,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 7,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 9,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 18,
        ],
        [    
            'user_id' => 5,
            'shop_id' => 4,
        ],
        [    
            'user_id' => 5,
            'shop_id' => 6,
        ],
        [    
            'user_id' => 5,
            'shop_id' => 7,
        ],
        [    
            'user_id' => 5,
            'shop_id' => 8,
        ],
        [    
            'user_id' => 5,
            'shop_id' => 20,
        ],
        [    
            'user_id' => 3,
            'shop_id' => 19,
        ],
        [    
            'user_id' => 4,
            'shop_id' => 11,
        ],
        [    
            'user_id' => 2,
            'shop_id' => 20,
        ],
        ]);
    }
}
