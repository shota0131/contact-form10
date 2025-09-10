<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-35 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 120),
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->faker->numberBetween(0, 180),
            'exercise_content' => $this->faker->sentence(6),

        ];
    }
}
