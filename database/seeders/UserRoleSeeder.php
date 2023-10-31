<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Roles para todos los usuarios (solo rol cliente)
        $users = User::all();
        $role = Role::where('name', 'Cliente')->first();
        foreach($users as $user)
        {
            $user->assignRole($role);
        }

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
    }
}
