<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id',
        'caregiver_id',
        'service_id',
        'start_time',
        'end_time',
        'final_price',
        'status',
        'special_notes',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function caregiver()
    {
        return $this->belongsTo(User::class, 'caregiver_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function details()
    {
        return $this->hasOne(ServiceDetail::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }



}
