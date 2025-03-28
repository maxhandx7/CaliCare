<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $services = [
            ['name' => 'Cuidado de niños', 'type' => 'child', 'base_price_per_hour' => 25000],
            ['name' => 'Cuidado de adultos mayores', 'type' => 'adult', 'base_price_per_hour' => 30000],
            ['name' => 'Cuidado de mascotas', 'type' => 'pet', 'base_price_per_hour' => 20000],
            ['name' => 'Cuidado del hogar', 'type' => 'house', 'base_price_per_hour' => 18000],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
