<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Esteba Zapata';
        $user->email = 'eszahe302@gmail.com';
        $user->password = bcrypt('12345678');
        $user->email_verified_at = now();
        $user->admon = true;
        $user->remember_token = Str::random(10);
        $user->save();

        $user = new User();
        $user->name = 'Samsung Laptop';
        $user->email = 'samsung@gmail.com';
        $user->password = bcrypt('12345678');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        factory(App\User::class, 20)->create();
    }
}
