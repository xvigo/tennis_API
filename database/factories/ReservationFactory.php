<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-2 months', '+2 months');
        $end = fake()->dateTimeBetween(
            $start->format('Y-m-d H:i:s').' +30 minutes',
            $start->format('Y-m-d H:i:s').' +3 hours',
        );

        return [
            'start' => $start,
            'end' => $end,
            'game_type' => fake()->randomElement(['singles', 'doubles']),
            'user_id' => fake()->numberBetween(1, User::count()),
            'court_id' => fake()->numberBetween(1, Court::count()),
        ];
    }
}
