<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador para login
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'rol' => 'admin',
        ]);

        // Cargar reparaciones de prueba
        $this->call(ReparacionSeeder::class);
    }
}