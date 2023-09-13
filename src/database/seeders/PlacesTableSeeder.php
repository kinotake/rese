<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            [
                'name' => '東京都',
            ],
            [
                'name' => '大阪府',
            ],
            [
                'name' => '福岡県',
            ],
        ]);
    }
}
