<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Complete Laravel Project',
                'Study Database Systems',
                'Prepare for Final Exam',
                'Learn Alpine.js',
                'Review PHP Notes',
                'Finish Assignment',
                'Practice Tailwind CSS',
                'Read Laravel Documentation',
            ]),

            'description' => fake()->sentence(),

            'long_description' => fake()->paragraphs(5, true),

            'is_completed' => fake()->boolean(),

            'due_date' => fake()->dateTimeBetween('-30 days', '+30 days'),
        ];
    }
}
