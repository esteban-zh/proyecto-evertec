<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $adminRole = Role::create(['name' => 'Admin']);


        $admin = new User();
        $admin->name = 'Esteba Zapata';
        $admin->email = 'eszahe302@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->email_verified_at = now();
        $admin->admon = true;
        $admin->admin_since = now();
        $admin->remember_token = Str::random(10);
        $admin->save();

        $admin->assignRole($adminRole);

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
