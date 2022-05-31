<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function colors()
    {
        return $this->belongsTo(CarColor::class, 'id_car_colors');
    }
}

