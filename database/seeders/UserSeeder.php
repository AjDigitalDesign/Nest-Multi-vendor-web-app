<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Seeder
        User::factory(1)->create([
            'name' => 'Admin Profile',
            'username' => 'admin',
            'email' => 'admin@nest.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // Vendor Seeder
        User::factory(1)->create([
            'name' => 'Vendor Profile',
            'username' => 'vendor',
            'email' => 'vendor@nest.com',
            'password' => Hash::make('vendor123'),
            'role' => 'vendor',
            'status' => 'active',
        ]);

        // Vendor Seeder
        User::factory(1)->create([
            'name' => 'User Profile',
            'username' => 'user',
            'email' => 'user@nest.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'status' => 'active',
        ]);
    }
}
