<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Car;

class RentedCar extends Model
{
    use HasFactory;

    protected $table = 'rented_cars';
    protected $fillable = [
        'user_id',
        'car_id',
        'booked_in',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
