<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UsersSeeder::class);

        \App\Models\Member::factory(2)->create();
        $this->call(TestimonyTypeSeeder::class);

        \App\Models\Testimony::factory(3)->create();
        $this->call(TestimonySeeder::class);
    }
}
