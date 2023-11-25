<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'andrea123',
            'password' => Hash::make('password'),
            'name' => 'Andrea',
            'surname' => 'Saldaña',
            'rut' => '199519697',
            'email' => 'andrea123@gmail.com',
            'points' => 0,
            'is_admin' => false,
        ]);

    }
}
