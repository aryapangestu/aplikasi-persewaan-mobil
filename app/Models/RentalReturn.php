<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalReturn extends Model
{
    use HasFactory;

    protected $fillable = ['rental_id', 'return_date', 'rental_days', 'rental_fee'];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }
}
