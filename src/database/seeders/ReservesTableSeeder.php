<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserves')->insert([
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2023-04-29',
            'time' => '13:00:00',
            'num_of_guest' => 2,
            'enter_at' => '2023-04-29 13:02:32',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => '2023-08-29',
            'time' => '17:00:00',
            'num_of_guest' => 3,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' =>3,
            'date' => '2023-06-13',
            'time' => '17:00:00',
            'num_of_guest' => 1,
            'enter_at' => '2023-06-13 17:05:00',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-02-01',
            'time' => '17:00:00',
            'num_of_guest' => 1,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2023-05-18',
            'time' => '14:00:00',
            'num_of_guest' => 4,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => '2023-07-07',
            'time' => '21:00:00',
            'num_of_guest' => 2,
            'enter_at' => '2023-07-07 21:02:00',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 3,
            'date' => '2023-06-09',
            'time' => '13:00:00',
            'num_of_guest' => 3,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-03-03',
            'time' => '21:00:00',
            'num_of_guest' => 4,
            'enter_at' => '2023-03-03 21:09:00',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2023-03-16',
            'time' => '12:00:00',
            'num_of_guest' => 5,
            'enter_at' => '2023-03-16 12:07:00',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => '2023-06-25',
            'time' => '09:00:00',
            'num_of_guest' => 6,
            'enter_at' => '2023-06-25 09:01:00',
        ],
        [    
            'user_id' => 1,
            'shop_id' => 3,
            'date' =>  \Carbon\Carbon::today(),
            'time' => '20:00:00',
            'num_of_guest' => 3,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => \Carbon\Carbon::today(),
            'time' => '11:00:00',
            'num_of_guest' => 6,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => \Carbon\Carbon::today(),
            'time' => '17:00:00',
            'num_of_guest' => 1,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => \Carbon\Carbon::today(),
            'time' => '18:00:00',
            'num_of_guest' => 3,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 3,
            'date' => \Carbon\Carbon::today()->addDays(1),
            'time' => '10:00:00',
            'num_of_guest' => 6,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => \Carbon\Carbon::today()->addDays(1),
            'time' => '20:00:00',
            'num_of_guest' => 2,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => \Carbon\Carbon::today()->addDays(1),
            'time' => '11:00:00',
            'num_of_guest' => 3,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => \Carbon\Carbon::today()->addDays(1),
            'time' => '17:00:00',
            'num_of_guest' => 5,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 3,
            'date' => \Carbon\Carbon::today()->addDays(2),
            'time' => '15:00:00',
            'num_of_guest' => 6,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => \Carbon\Carbon::today()->addDays(2),
            'time' => '09:00:00',
            'num_of_guest' => 2,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 1,
            'date' => \Carbon\Carbon::today()->addDays(3),
            'time' => '15:00:00',
            'num_of_guest' => 1,
            'enter_at' => null,
        ],
        [    
            'user_id' => 1,
            'shop_id' => 2,
            'date' => \Carbon\Carbon::today()->addDays(3),
            'time' => '18:00:00',
            'num_of_guest' => 2,
            'enter_at' => null,
        ],
        ]);
    }
}
