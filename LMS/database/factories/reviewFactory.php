<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class reviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' =>fake()->text(),
            'rate' => fake()->numberBetween(1,5),
            'course_id' => Course::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id,
        ];
    }
}
