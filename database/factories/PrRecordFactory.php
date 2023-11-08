<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrRecord>
 */
class PrRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $exercise = Exercise::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            // 'user_id' => User::factory(),
            'exercise' => $exercise->name,
            'pr' => $this->faker->numberBetween(50, 250),
            'reps' => $this->faker->numberBetween(1, 20),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->date(),
        ];
    }
}
