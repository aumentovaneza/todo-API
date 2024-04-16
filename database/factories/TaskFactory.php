<?php

namespace Database\Factories;

use App\Models\StatusCategory;
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
        $categoryIDs = StatusCategory::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(),
            'status' => $this->faker->randomElement($categoryIDs),
            'active' => $this->faker->numberBetween(0,1)
        ];
    }
}
