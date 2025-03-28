<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Password común para pruebas
            'role' => $this->faker->randomElement(['client', 'caregiver']),
            'is_verified' => $this->faker->boolean(70), // 70% de probabilidad de estar verificado
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    // States para roles específicos
    public function client()
    {
        return $this->state(['role' => 'client']);
    }

    public function caregiver()
    {
        return $this->state([
            'role' => 'caregiver',
            'is_verified' => true, // Cuidadores siempre verificados
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
