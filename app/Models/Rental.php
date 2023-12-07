<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'start_date', 'end_date', 'rental_status'];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function rentalReturn()
    {
        return $this->hasMany(RentalReturn::class, 'rental_id');
    }
}
