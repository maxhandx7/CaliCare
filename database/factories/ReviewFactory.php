<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => \App\Models\Booking::factory(),
            'client_id' => \App\Models\User::factory()->client(),
            'caregiver_id' => \App\Models\User::factory()->caregiver(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->boolean(70) ? $this->faker->sentence() : null,
        ];
    }
}
