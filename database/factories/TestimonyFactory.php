<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\TestimonyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimony>
 */
class TestimonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id' => Member::all()->random()->id,
            'testimony_type_id' => TestimonyType::all()->random()->id,
            'test_title' => $this->faker->sentence(1),
            'test_body' => $this->faker->sentence(6)
        ];
    }
}
