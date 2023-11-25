<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            // 'user_id' => User::factory(),
            'user_id' => $user->id,
            'day' => $this->faker->dateTimeThisMonth('+ 2 months'),
            'hour' => $this->faker->randomElement([9, 10, 11, 12, 13, 14, 15]),
            'reason' => $this->faker->randomElement(['dieta', 'control', 'seguimiento']),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
