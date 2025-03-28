<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NeedServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener todos los servicios y necesidades
        $services = \App\Models\Service::all();
        $needs = \App\Models\Need::all();

        // Crear relaciones coherentes (cada necesidad con servicios de su categoría)
        foreach ($needs as $need) {
            $matchingServices = $services->where('type', $need->category);
            
            if ($matchingServices->isNotEmpty()) {
                // Relacionar cada necesidad con 1-3 servicios aleatorios de su categoría
                $randomServices = $matchingServices->random(
                    rand(1, min(3, $matchingServices->count()))
                );
                
                foreach ($randomServices as $service) {
                    DB::table('need_service')->insert([
                        'need_id' => $need->id,
                        'service_id' => $service->id,
                    ]);
                }
            }
        }
    }
}
