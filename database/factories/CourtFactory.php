<?php

namespace Database\Factories;

use App\Models\Surface;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Court>
 */
class CourtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // sequence faker
        $num = fake()->unique()->numberBetween(1, 10);
        $word = fake()->randomElement(['inside', 'outside']);

        return [
            'name' => "Court no.{$num} {$word}",
            'surface_id' => Surface::factory()
        ];
    }
}
