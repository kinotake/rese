<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [    
            'name' => '中村光',
            'email' => 'test@test',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 1,
            'email_verified_at' => null,
        ],
        [    
            'name' => '中山美穂',
            'email' => 'owner@owner',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
            'email_verified_at' => \Carbon\Carbon::now(),
        ],
        [    
            'name' => '上杉謙信',
            'email' => 'admin@admin',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 3,
            'email_verified_at' => \Carbon\Carbon::now(),
        ],
        ]);
    }
}
