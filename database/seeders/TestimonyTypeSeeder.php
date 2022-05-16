<?php

namespace Database\Seeders;

use App\Models\Testimony;
use App\Models\TestimonyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestimonyType::create([
            'type' => 'Salvation'
        ]);
    }
}
