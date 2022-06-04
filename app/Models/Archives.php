<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_car',
        'date_start',
        'date_end',
        'km_before',
        'km_traveled',
        'rental_amount',
        'refundable_deposit',
        'amount_to_pay',
        'rented',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cars()
    {
        return $this->belongsTo(Car::class, 'id_car');
    }

    public function dateDiffInDays($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400)) + 1;
    }
}
