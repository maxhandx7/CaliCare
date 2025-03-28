<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\need>
 */
class NeedFactory extends Factory
{
    protected static $needs = [
        'child' => [
            'Clases de matemáticas',
            'Cuidado nocturno',
            'Alergias alimenticias',
            'Apoyo en tareas escolares',
            'Cuidado de bebés'
        ],
        'adult' => [
            'Administración de medicamentos',
            'Movilidad reducida',
            'Acompañamiento médico',
            'Cuidado post-operatorio',
            'Asistencia en alimentación'
        ],
        'pet' => [
            'Paseos diarios',
            'Cuidado veterinario',
            'Alimentación especial',
            'Cuidado durante viajes',
            'Baño y grooming'
        ],
        'house' => [
            'Limpieza profunda',
            'Cocina',
            'Jardinería',
            'Lavandería',
            'Organización del hogar'
        ]
    ];

    public function definition()
    {
        $category = $this->faker->randomElement(['child', 'adult', 'pet', 'house']);

        return [
            'name' => function() use ($category) {
                // Verificamos si quedan necesidades predefinidas
                if (!empty(static::$needs[$category])) {
                    $needKey = array_rand(static::$needs[$category]);
                    $need = static::$needs[$category][$needKey];
                    unset(static::$needs[$category][$needKey]);
                    return $need;
                }
                
                // Si no hay más necesidades predefinidas, generamos una única
                return $this->faker->unique()->sentence(2);
            },
            'category' => $category,
            'description' => $this->faker->sentence(),
        ];
    }
}
