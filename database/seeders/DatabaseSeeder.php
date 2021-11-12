<?php

namespace Database\Seeders;

use Faker\Core\Number;
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
        \App\Models\Employee::factory(10)->create();
        // DB::table('employees')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'company' => Str::random(10),
        //     'phone_number' => Number::random(10),
        //     'city' => Str::random(10),
        //     'joining_date' => datetime::random(10),
        //     'image' => Str::random(10),

        // ]);
    }
}
