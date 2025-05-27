<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = User::create([
            'uuid'          => Str::uuid(),
            'name'          => 'Admin',
            'role'          => 'admin',
            'nomor_induk'   => '001',
            'phone'         => '082283122739',
            'email'         => 'admin@testmail.com',
            'password'      => Hash::make('Admin123'),
        ]);
        
        $user = User::create([
            'uuid'          => Str::uuid(),
            'name'          => 'User',
            'role'          => 'user',
            'nomor_induk'   => '002',
            'phone'         => '082283122738',
            'email'         => 'user@testmail.com',
            'password'      => Hash::make('User1234'),
        ]);
    }
}
