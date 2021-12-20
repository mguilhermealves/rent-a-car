<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RentedCar;

/**
 * Car.
 *
 * @author	Rafael Cardoso
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 20th, 2021.
 * @see		Model
 * @global
 */
class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'model',
        'brand',
        'license_plate',
        'year_of_manufacture'
    ];

    /**
     * user.
     *
     * @author	Rafael Cardoso
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 20th, 2021.
     * @access	public
     * @return	mixed
     */

    public function rents()    
    {
        return $this->hasMany(RentedCar::class);
    }
}
