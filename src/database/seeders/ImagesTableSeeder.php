<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([

        [    
            'post_id' => 1,
            'path' => 'storage/images/post/good.jpg',
        ],
        [    
            'post_id' => 6,
            'path' => 'storage/images/post/bad.jpg',
        ],
        [    
            'post_id' => 8,
            'path' => 'storage/images/post/good.jpg',
        ],

        ]);
    }
}
