<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsername = 'Ochietto';
        $adminPassword = 'Jaqamain3pals';

        // Verificar si ya existe un usuario con el mismo username
        if (!User::where('username', $adminUsername)->exists()) {
            User::create([
                'username' => $adminUsername,
                'password' => Hash::make($adminPassword),
                'name' => 'Juan',
                'surname' => 'Ochietto',
                'rut' => '123456789',
                'email' => 'juan@gmail.com',
                'points' => 0,
                'is_admin' => true,  // Asegúrate de que este campo exista en tu tabla users
            ]);
        }
    }
}
