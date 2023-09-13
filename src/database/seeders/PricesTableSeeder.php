<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            [    
                'shop_id' => 2,
                'name' => 'プランA',
                'price' => 1000,
            ],
            [    
                'shop_id' => 2,
                'name' => 'プランB',
                'price' => 2000,
            ],
            [    
                'shop_id' => 2,
                'name' => 'プランC',
                'price' => 3000,
            ],
        ]);
    }
}
