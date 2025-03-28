<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+1 month');
        $end = clone $start;
        $end->modify('+'.rand(1, 4).' hours');

        return [
            'client_id' => \App\Models\User::factory()->client(),
            'caregiver_id' => \App\Models\User::factory()->caregiver(),
            'service_id' => function() {
                return \App\Models\Service::inRandomOrder()->first()->id;
            },
            'start_time' => $start,
            'end_time' => $end,
            'final_price' => $this->faker->numberBetween(20000, 100000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed']),
        ];
    }
}
