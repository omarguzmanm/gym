<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $roleSuperAdmin = Role::create(['name' => 'Super Administrador']);
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleNutriologo = Role::create(['name' => 'Nutriologo']);
        $roleEntrenador = Role::create(['name' => 'Entrenador']);
        $roleCliente = Role::create(['name' => 'Cliente']);

        // Crear permisos
        $permissions = [
            'dashboard',
            'routines',
            'exercises',
            'ticket',
            'sales',
            'memberships',
            'appointments',
            'analysis',
            'analysis-report',
            'diets',
            'diets-report',
            'users',
            'chat',
            'routine-exercises',
            'myProgress',
            'nutrition',
            'myPrs',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a roles
        $roleSuperAdmin->givePermissionTo('dashboard','routines', 'exercises', 'appointments', 'ticket', 'memberships', 'analysis', 'diets', 'diets-report', 'analysis-report', 'chat','users', 'sales');
        $roleAdmin->givePermissionTo('dashboard','ticket','memberships', 'chat');
        $roleNutriologo->givePermissionTo('appointments', 'analysis', 'diets', 'diets-report', 'analysis-report', 'chat', 'users');
        $roleEntrenador->givePermissionTo('routines', 'exercises');
        $roleCliente->givePermissionTo('appointments', 'routines', 'chat', 'myProgress', 'routine-exercises', 'nutrition', 'myPrs', 'diets-report');

    }
}
