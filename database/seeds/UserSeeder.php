<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        User::truncate();
        //Permission::truncate();

        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'User']);

        $viewProductPermission = Permission::create(['name' => 'view products']);
        $createProductPermission = Permission::create(['name' => 'create products']);
        $updateProductPermission = Permission::create(['name' => 'update products']);
        $deleteProductPermission = Permission::create(['name' => 'delete products']);


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

        $user->assignRole($userRole);
        
        factory(App\User::class, 20)->create();
    }
}
