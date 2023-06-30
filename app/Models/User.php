<?php

namespace App\Models;

use App\Models\Reservation;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'surname',
        'phone',
        'role'
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

}
