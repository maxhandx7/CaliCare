<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'role',
        'is_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Relaciones

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function bookingsAsClient()
    {
        return $this->hasMany(Booking::class, 'client_id');
    }

    public function bookingsAsCaregiver()
    {
        return $this->hasMany(Booking::class, 'caregiver_id');
    }

    public function reviewsAsClient()
    {
        return $this->hasMany(Review::class, 'client_id');
    }

    public function reviewsAsCaregiver()
    {
        return $this->hasMany(Review::class, 'caregiver_id');
    }

    public function isCaregiver(): bool
    {
        return $this->role === 'caregiver';
    }

}
