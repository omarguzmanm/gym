<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('users');
        Storage::makeDirectory('users');

        User::factory(100)->create();
        $this->call(MembershipSeeder::class);

        // Usuarios de prueba
        $cliente = User::factory()->create([
            'name' => 'Test Cliente',
            'email' => 'cliente@example.com',
            'password' => bcrypt('cliente123')
        ]);
        $cliente->assignRole('Cliente');
        
        $entrenador = User::factory()->create([
            'name' => 'Test Entrenador',
            'email' => 'entrenador@example.com',
            'password' => bcrypt('entrenador123')
        ]);
        $entrenador->assignRole('Entrenador');
        
        $nutriologo = User::factory()->create([
            'name' => 'Test Nutriologo',
            'email' => 'nutriologo@example.com',
            'password' => bcrypt('nutriologo123')
        ]);
        $nutriologo->assignRole('Nutriologo');
        
        $admin = User::factory()->create([
            'name' => 'Test Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('Administrador');
        
        $superAdmin = User::factory()->create([
            'name' => 'Test SuperAdmin',
            'email' => 'superAdmin@example.com',
            'password' => bcrypt('superAdmin123')
        ]);
        $superAdmin->assignRole('Super Administrador');
        
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}