<?php

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
        factory(\App\Cicles::class, 20)->create();
        factory(\App\Articles::class, 50)->create();
        factory(\App\User::class, 10)->create();
        factory(\App\Offers::class, 50)->create();
        factory(\App\Requirements::class, 20)->create();
        factory(\App\Applied::class, 50)->create();
    }
}
