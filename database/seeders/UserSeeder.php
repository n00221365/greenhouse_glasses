<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Here is where you enter the data that will populate the database
     */
    public function run(): void
    {

        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User;
        $admin->name = "Ben Kershaw";
        $admin->email = "admin23@ca1-music-library.com";
        $admin->password = "secret12345";
        $admin->save();

        $admin->roles()->attach($role_admin);
        
        $user = new User;
        $user->name = "John Jones";
        $user->email = "user@caexample.com";
        $user->password = "secret123";
        $user->save();

        $user->roles()->attach($role_user);
    }
}