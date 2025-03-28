<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isCaregiver = $this->faker->boolean(30); // 30% de probabilidad de ser cuidador

        return [
            'user_id' => \App\Models\User::factory(),
            'lastname' => $this->faker->lastName(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'experience_years' => $isCaregiver ? $this->faker->numberBetween(1, 10) : null,
            'availability' => $isCaregiver ? $this->faker->randomElement(['full_time', 'part_time']) : null,
            'schedule' => $isCaregiver ? json_encode([
                'Lunes' => ['09:00-12:00', '14:00-18:00'],
                'Martes' => ['08:00-11:00']
            ]) : null,
        ];
    }
}
