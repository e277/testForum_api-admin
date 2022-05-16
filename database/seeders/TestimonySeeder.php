<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Testimony;
use App\Models\TestimonyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::create([
            'member_id' => Member::all()->random()->id,
            'testimony_type_id' => TestimonyType::all()->random()->id,
            'test_title' => 'Overcoming',
            'test_body' => '“Do not be anxious about anything, but in everything by prayer and supplication with thanksgiving let your requests be made known to God” (Phil. 4:6, ESV).'
        ]);
        Testimony::create([
            'member_id' => Member::all()->random()->id,
            'testimony_type_id' => TestimonyType::all()->random()->id,
            'test_title' => 'Salvation',
            'test_body' => '“And my God will supply every need of yours according to his riches in glory in Christ Jesus” (Phil. 4:19, ESV).'
        ]);
        Testimony::create([
            'member_id' => Member::all()->random()->id,
            'testimony_type_id' => TestimonyType::all()->random()->id,
            'test_title' => 'Fear',
            'test_body' => '"So do not fear, for I am with you; do not be dismayed, for I am your God. I will strengthen you and help you; I will uphold you with my righteous right hand" (Isaiah 41:10).'
        ]);
        Testimony::create([
            'member_id' => Member::all()->random()->id,
            'testimony_type_id' => TestimonyType::all()->random()->id,
            'test_title' => 'Overcoming',
            'test_body' => '“But God shows his love for us in that while we were still sinners, Christ died for us” (Rom. 5:8, ESV).'
        ]);
    }
}
