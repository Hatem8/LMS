<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageName = $this->faker->image(storage_path('app/public/quizzes'),
        640,
        480,
        null,
        false
    );
        return [
            'image'=> url('/Storage/quizzes'.'/'.$imageName),
            'course_id' => Course::inRandomOrder()->first()->id
        ];
    }
}
