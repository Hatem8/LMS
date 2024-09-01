<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageName = $this->faker->image(storage_path('app/public/instructors'),
        640,
        480,
        null,
        false
    );
        return [
            'name' => fake()->name(),
            'title' => fake()->name(),
            'description'=>fake()->realText(),
            'image'=> url('/Storage/instructors'.'/'.$imageName),
            'course_id' => Course::inRandomOrder()->first()->id
        ];
    }
}
