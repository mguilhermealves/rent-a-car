<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RentedCar;

class RentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total = rand(4, 10);
        while($total > 0){
            $days = rand(1, 8);
            $days = '+'.$days;
            $default = new RentedCar;
            $default->user_id = \App\Models\User::inRandomOrder()->first()->id;
            $default->car_id = \App\Models\Car::inRandomOrder()->first()->id;
            $default->booked_in = date('Y-m-d', strtotime($days." days",strtotime(date('Y-m-d')))); 
            $default->save();
            $total--;
        }
    }
}
