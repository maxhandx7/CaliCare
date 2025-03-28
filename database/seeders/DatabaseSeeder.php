<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            ServiceSeeder::class, // Solo los 4 servicios principales
        ]);

        \App\Models\Need::factory(20)->create();

        // 3. Usuarios y perfiles
        \App\Models\User::factory(50)->create()->each(function ($user) {
            \App\Models\Profile::factory()->create(['user_id' => $user->id]);
        });

        // 4. Reservas con detalles específicos
        \App\Models\Booking::factory(100)->create()->each(function ($booking) {
            \App\Models\ServiceDetail::factory()->create(['booking_id' => $booking->id]);
            
            if (fake()->boolean(70)) {
                \App\Models\Review::factory()->create([
                    'booking_id' => $booking->id,
                    'client_id' => $booking->client_id,
                    'caregiver_id' => $booking->caregiver_id,
                ]);
            }
        });

        $this->call([
            NeedServiceSeeder::class,  // Relaciones entre necesidades y servicios
        ]);
    }
}
