<?php

namespace App\Models;

use App\Models\Court;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surface extends Model
{
    use HasFactory;

    public function courts() {
        return $this->hasMany(Court::class);
    }
}
