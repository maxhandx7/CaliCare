<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\service_detail>
 */
class ServiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['child', 'adult', 'pet']);
        
        $details = [
            'child' => [
                'name' => $this->faker->firstName(),
                'age' => $this->faker->numberBetween(1, 12),
                'allergies' => $this->faker->randomElements(['lactosa', 'frutos secos', 'ninguna'], 2),
                'school_help' => $this->faker->boolean()
            ],
            'adult' => [
                'name' => $this->faker->name(),
                'age' => $this->faker->numberBetween(60, 90),
                'medical_conditions' => $this->faker->randomElements(['hipertensión', 'diabetes', 'artritis'], 1),
                'mobility' => $this->faker->randomElement(['bastón', 'silla de ruedas', 'autónomo'])
            ],
            'pet' => [
                'name' => $this->faker->firstName(),
                'type' => $this->faker->randomElement(['perro', 'gato', 'ave']),
                'special_instructions' => $this->faker->sentence()
            ]
        ];

        return [
            'booking_id' => \App\Models\Booking::factory(),
            'type' => $type,
            'details' => $details[$type],
        ];
    }
}
