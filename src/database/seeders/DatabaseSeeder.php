<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          ShopsTableSeeder::class,
          LikesTableSeeder::class,
          UsersTableSeeder::class,
          CategoriesTableSeeder::class,
          PlacesTableSeeder::class,
          ReservesTableSeeder::class,
          PostsTableSeeder::class,
          RolesTableSeeder::class,
          PhotosTableSeeder::class,
          PricesTableSeeder::class,
        ]);
    }
}
