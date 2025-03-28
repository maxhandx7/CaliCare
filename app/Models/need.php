<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class need extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'need_service');
    }
}
