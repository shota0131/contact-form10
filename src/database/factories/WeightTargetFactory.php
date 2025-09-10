<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightTargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'goal_weight' => $this->faker->randomFloat(1, 45, 80),
            'log_date' => now(),
        ];
    }
}
