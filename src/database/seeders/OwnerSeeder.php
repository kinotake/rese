<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
        [    
            'name' => '中山美穂',
            'email' => 'owner@owner',
            'password' => \Hash::make('qwertyui'),
        ],
        [    
            'name' => '井口幸太郎',
            'email' => 'owner2@owner2',
            'password' => \Hash::make('qwertyui'),
        ],
        [    
            'name' => '佐久間玲子',
            'email' => 'owner3@owner3',
            'password' => \Hash::make('qwertyui'),
        ],
        [    
            'name' => '田中美紀',
            'email' => 'owner4@owner4',
            'password' => \Hash::make('qwertyui'),
        ],
        [    
            'name' => '篠塚亜依',
            'email' => 'owner5@owner5',
            'password' => \Hash::make('qwertyui'),
        ],
        ]);
    }
}
