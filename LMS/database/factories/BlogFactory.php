<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageName = $this->faker->image(storage_path('app/blogs'),
        640,
        480,
        null,
        false
    );
        return [
            'title' => fake()->name(),
            'description'=>fake()->realText(),
            'image'=> url('/Storage/blogs/').$imageName,
        ];
    }
}
