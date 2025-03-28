<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'type',
        'details',
    ];

    protected $casts = [
        'details' => 'json', // Datos dinámicos (niño/adulto/mascota)
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    
}
