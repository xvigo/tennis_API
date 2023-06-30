<?php

namespace App\Models;


use App\Models\User;
use App\Models\Court;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'game_type',
        'user_id',
        'court_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function court() {
        return $this->belongsTo(Court::class);
    }
}
