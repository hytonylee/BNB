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
        // \App\Models\User::factory(10)->create();
        \App\Models\Bookable::factory(100)->create();
        $this->call(BookingsTableSeeder::class);

        \App\Models\Bookable::all()->each(function(\App\Models\Bookable $bookable){
            $reviews = \App\Models\Review::factory(random_int(5,30))->make();
            $bookable->reviews()->saveMany($reviews);
        });
    }
}
