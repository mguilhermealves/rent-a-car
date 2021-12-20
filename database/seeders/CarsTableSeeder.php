<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            'Volkwagem' => [
                'Gol',
                'Parati',
                'Jetta',
                'UP',
                'Voyage',
                'Saveiro',
                'Amarok'
            ],
            'Fiat' => [
                'Palio',
                'Uno',
                'Mobi',
                'Fiorino',
                'Toro',
                'Strada',
                'Argo'
            ],
            'Chevrolet' => [
                'Cobalt',
                'S10',
                'Onix',
                'Spin',
                'Equinox',
                'Blazer',
                'Tracker'
            ],
            
        ];

        foreach($cars as $brand => $car){
            for($count = 0; $count < 7; $count++){
                $default = new Car;
                $default->model = $car[rand(0,2)];
                $default->brand = $brand;
                $default->license_plate = Str::upper(Str::random(3)).rand(1,9).Str::upper(Str::random(1)).rand(10,99);
                $default->year_of_manufacture = rand(2014, 2021);
                $default->save();
            }

        }
    }
}
