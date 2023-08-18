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
            'shop_id' => 4,
            'date' => '2023-04-29',
            'time' => '13:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 1,
            'shop_id' => 19,
            'date' => '2023-08-29',
            'time' => '17:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 1,
            'shop_id' => 14,
            'date' => '2023-06-13',
            'time' => '17:00:00',
            'num_of_guest' => 1
        ],
        [    
            'user_id' => 1,
            'shop_id' => 10,
            'date' => '2023-02-01',
            'time' => '17:00:00',
            'num_of_guest' => 1
        ],
        [    
            'user_id' => 1,
            'shop_id' => 7,
            'date' => '2023-05-18',
            'time' => '14:00:00',
            'num_of_guest' => 4
        ],
        [    
            'user_id' => 2,
            'shop_id' => 8,
            'date' => '2023-10-21',
            'time' => '21:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 2,
            'shop_id' => 6,
            'date' => '2023-12-25',
            'time' => '13:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 2,
            'shop_id' => 10,
            'date' => '2023-03-03',
            'time' => '21:00:00',
            'num_of_guest' => 4
        ],
        [    
            'user_id' => 2,
            'shop_id' => 19,
            'date' => '2023-03-16',
            'time' => '12:00:00',
            'num_of_guest' => 5
        ],
        [    
            'user_id' => 2,
            'shop_id' => 4,
            'date' => '2023-06-25',
            'time' => '9:00:00',
            'num_of_guest' => 6
        ],
        [    
            'user_id' => 3,
            'shop_id' => 14,
            'date' => '2023-12-04',
            'time' => '20:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 3,
            'shop_id' => 10,
            'date' => '2023-08-03',
            'time' => '11:00:00',
            'num_of_guest' => 6
        ],
        [    
            'user_id' => 3,
            'shop_id' => 8,
            'date' => '2023-03-02',
            'time' => '17:00:00',
            'num_of_guest' => 1
        ],
        [    
            'user_id' => 3,
            'shop_id' => 18,
            'date' => '2023-03-14',
            'time' => '18:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 3,
            'shop_id' => 6,
            'date' => '2023-05-09',
            'time' => '10:00:00',
            'num_of_guest' => 6
        ],
        [    
            'user_id' => 4,
            'shop_id' => 5,
            'date' => '2023-12-14',
            'time' => '20:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 4,
            'shop_id' => 18,
            'date' => '2023-03-22',
            'time' => '11:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 4,
            'shop_id' => 9,
            'date' => '2023-04-24',
            'time' => '17:00:00',
            'num_of_guest' => 5
        ],
        [    
            'user_id' => 4,
            'shop_id' => 2,
            'date' => '2023-11-01',
            'time' => '15:00:00',
            'num_of_guest' => 6
        ],
        [    
            'user_id' => 4,
            'shop_id' => 7,
            'date' => '2023-11-04',
            'time' => '09:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 5,
            'shop_id' => 19,
            'date' => '2023-04-01',
            'time' => '15:00:00',
            'num_of_guest' => 1
        ],
        [    
            'user_id' => 5,
            'shop_id' => 20,
            'date' => '2023-08-09',
            'time' => '18:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 5,
            'shop_id' => 1,
            'date' => '2023-01-01',
            'time' => '22:00:00',
            'num_of_guest' => 4
        ],
        [    
            'user_id' => 5,
            'shop_id' => 13,
            'date' => '2023-09-03',
            'time' => '16:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 5,
            'shop_id' => 14,
            'date' => '2023-08-12',
            'time' => '14:00:00',
            'num_of_guest' => 6
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-07-14',
            'time' => '13:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '16:00:00',
            'num_of_guest' => 1
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-07-27',
            'time' => '19:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-07-16',
            'time' => '21:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-07-02',
            'time' => '15:00:00',
            'num_of_guest' => 3
        ],
        [    
            'user_id' => 1,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '20:00:00',
            'num_of_guest' => 4 
        ],
        [    
            'user_id' => 3,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '15:00:00',
            'num_of_guest' => 6 
        ],
        [    
            'user_id' => 2,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '11:00:00',
            'num_of_guest' => 5 
        ],
        [    
            'user_id' => 4,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '12:00:00',
            'num_of_guest' => 2
        ],
        [    
            'user_id' => 5,
            'shop_id' => 4,
            'date' => '2023-08-06',
            'time' => '13:00:00',
            'num_of_guest' => 2 
        ],
        [    
            'user_id' => 2,
            'shop_id' => 5,
            'date' => '2023-08-17',
            'time' => '09:00:00',
            'num_of_guest' => 1 
        ],
        [    
            'user_id' => 3,
            'shop_id' => 6,
            'date' => '2023-08-17',
            'time' => '18:00:00',
            'num_of_guest' => 2 
        ],
        [    
            'user_id' => 4,
            'shop_id' => 2,
            'date' => '2023-08-17',
            'time' => '11:00:00',
            'num_of_guest' => 3 
        ],
        [    
            'user_id' => 2,
            'shop_id' => 5,
            'date' => '2023-08-18',
            'time' => '09:00:00',
            'num_of_guest' => 1 
        ],
        [    
            'user_id' => 3,
            'shop_id' => 6,
            'date' => '2023-08-18',
            'time' => '18:00:00',
            'num_of_guest' => 2 
        ],
        [    
            'user_id' => 4,
            'shop_id' => 2,
            'date' => '2023-08-18',
            'time' => '11:00:00',
            'num_of_guest' => 3 
        ],
        ]);
    }
}
