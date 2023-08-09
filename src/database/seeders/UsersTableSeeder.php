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
        ],
        [    
            'name' => '木村昇',
            'email' => 'test2@test2',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 1,
        ],
        [    
            'name' => '向井和弘',
            'email' => 'test3@test3',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 1,
        ],
        [    
            'name' => '樋口一葉',
            'email' => 'test4@test4',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 1,
        ],
        [    
            'name' => '大林餅',
            'email' => 'test5@test5',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 1,
        ],
        [    
            'name' => '中山美穂',
            'email' => 'owner@owner',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
        ],
        [    
            'name' => '井口幸太郎',
            'email' => 'owner2@owner2',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
        ],
        [    
            'name' => '佐久間玲子',
            'email' => 'owner3@owner3',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
        ],
        [    
            'name' => '田中美紀',
            'email' => 'owner4@owner4',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
        ],
        [    
            'name' => '篠塚亜依',
            'email' => 'owner5@owner5',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 2,
        ],
        [    
            'name' => '上杉謙信',
            'email' => 'admin@admin',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 3,
        ],
        [    
            'name' => '齋藤誠',
            'email' => 'admin2@admin2',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 3,
        ],
        [    
            'name' => '鈴木鍋子',
            'email' => 'admin3@admin3',
            'password' => \Hash::make('qwertyui'),
            'role_id' => 3,
        ],
        ]);
    }
}
