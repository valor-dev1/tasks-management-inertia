<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
            'user_id' => User::factory(),
            'assignee_id'   => User::factory(),
            'title'     => fake()->sentence(9),
            'description' => fake()->paragraph(5),
            'priority'  => fake()->randomElement(['low', 'normal', 'hight']),
            'status'    => fake()->randomElement(['todo', 'backlog', 'in_progress', 'in_review', 'done']),
            'due_date'  => fake()->dateTimeBetween('+1 week', '+1 month')
        ];
    }
}
