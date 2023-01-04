<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin'
        ]);
        $kasir = Role::create([
            'name' => 'Kasir'
        ]);
        $waiter = Role::create([
            'name' => 'Waiter'
        ]);
        $owner = Role::create([
            'name' => 'Owner'
        ]);

        $user = User::create([
            'name' => 'Alfian Gading Saputra',
            'email' => 'alfian@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($admin);
    }
}