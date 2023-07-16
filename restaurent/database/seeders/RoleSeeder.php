<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'hadi.es',
            'email' => 'hadiesmaeli24@gmail.com',
            'password' => Hash::make('hadi')
        ]);

        $user = User::create([
            'name' => 'hadi',
            'email' => 'hadi@gmail.com',
            'password' => Hash::make('hadi')
        ]);

        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);
    }
}
