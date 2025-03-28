<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class service extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'base_price_per_hour',
    ];


    public function needs()
    {
        return $this->belongsToMany(Need::class, 'need_service');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    // Para generar slugs automáticos (ej: "Cuidado de niños" → "cuidado-de-ninos")
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    
}
