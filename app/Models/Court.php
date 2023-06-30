<?php

namespace App\Models;

use App\Models\Surface;
use App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    public function surface() {
        return $this->belongsTo(Surface::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
