<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageName = $this->faker->image(storage_path('app/public/courses'),
        640,
        480,
        null,
        false
    );
        return [
            'name' => fake()->name(),
            'title' => fake()->name(),
            'duration' =>fake()->numberBetween(1,5),
            'overview' =>fake()->text(),
            'price' => fake()->numberBetween(50,100),
            'discount' =>fake()->numberBetween(1,8)*10,
            'image'=> url('/Storage/courses'.'/'.$imageName),
            'instructor' =>fake()->name(),
            'category_id'=>Category::inRandomOrder()->first()->id,
        ];
    }
}
