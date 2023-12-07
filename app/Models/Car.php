<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'plate_number', 'rental_rate_per_day', 'available'];

    public function rentals()
    {
        return $this->hasMany(Rental::class)->onDelete('cascade');
    }
}
