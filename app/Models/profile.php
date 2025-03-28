<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $casts = [
        'schedule' => 'json', // Horarios en JSON
    ];

    protected $fillable = [
        'user_id',
        'lastname',
        'id_type',
        'num_doc',
        'bio',
        'phone',
        'address',
        'city',
        'country',
        'experience_years',
        'availability',
        'schedule',
        'certifications',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
