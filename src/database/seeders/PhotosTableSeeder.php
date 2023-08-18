<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
        [    
            'shop_id' => 1,
            'path' => 'storage/images/1.sushi.jpg',
        ],
        [    
            'shop_id' => 2,
            'path' => 'storage/images/2.yakiniku.jpg',
        ],
        [    
            'shop_id' => 3,
            'path' => 'storage/images/3.izakaya.jpg',
        ],
        [    
            'shop_id' => 4,
            'path' => 'storage/images/4.italian.jpg',
        ],
        [    
            'shop_id' => 5,
            'path' => 'storage/images/5.ramen.jpg',
        ],
        [    
            'shop_id' => 6,
            'path' => 'storage/images/2.yakiniku.jpg',
        ],
        [    
            'shop_id' => 7,
            'path' => 'storage/images/4.italian.jpg',
        ],
        [    
            'shop_id' => 8,
            'path' => 'storage/images/5.ramen.jpg',
        ],
        [    
            'shop_id' => 9,
            'path' => 'storage/images/3.izakaya.jpg',
        ],
        [    
            'shop_id' => 10,
            'path' => 'storage/images/1.sushi.jpg',
        ],
        [    
            'shop_id' => 11,
            'path' => 'storage/images/2.yakiniku.jpg',
        ],
        [    
            'shop_id' => 12,
            'path' => 'storage/images/2.yakiniku.jpg',
        ],
        [    
            'shop_id' => 13,
            'path' => 'storage/images/3.izakaya.jpg',
        ],
        [    
            'shop_id' => 14,
            'path' => 'storage/images/1.sushi.jpg',
        ],
        [    
            'shop_id' => 15,
            'path' => 'storage/images/5.ramen.jpg',
        ],
        [    
            'shop_id' => 16,
            'path' => 'storage/images/3.izakaya.jpg',
        ],
        [    
            'shop_id' => 17,
            'path' => 'storage/images/1.sushi.jpg',
        ],
        [    
            'shop_id' => 18,
            'path' => 'storage/images/2.yakiniku.jpg',
        ],
        [    
            'shop_id' => 19,
            'path' => 'storage/images/4.italian.jpg',
        ],
        [    
            'shop_id' => 20,
            'path' => 'storage/images/1.sushi.jpg',
        ],
        ]);
    }
}
