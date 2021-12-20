<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\User as UserFactory;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = new User;
        $default->name = 'Rafael Cardoso';
        $default->email = 'r.cardoso1986@gmail.com';
        $default->cpf = '78872507065';
        $default->password = Hash::make('123456');
        $default->remember_token = Str::random(10);
        $default->email_verified_at = now();
        $default->save();

        UserFactory::factory()->count(rand(20, 40))->create();
    }
}
