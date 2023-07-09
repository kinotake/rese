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
            'password' => 'qwertyui',
        ],
        [    
            'name' => '木村昇',
            'email' => 'test2@test2',
            'password' => 'qwertyui',
        ],
        [    
            'name' => '向井和弘',
            'email' => 'test3@test3',
            'password' => 'qwertyui',
        ],
        [    
            'name' => '樋口一葉',
            'email' => 'test4@test4',
            'password' => 'qwertyui',
        ],
        [    
            'name' => '大林餅',
            'email' => 'test5@test5',
            'password' => 'qwertyui',
        ],
        ]);
    }
}
