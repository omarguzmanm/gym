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
        $role1 = Role::create(['name' => 'Super Administrador']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Nutriologo']);
        $role4 = Role::create(['name' => 'Entrenador']);
        $role5 = Role::create(['name' => 'Cliente']);

        // Crear permisos
        $permissions = [
            'routines',
            'exercises',
            'appointments',
            'ticket',
            'memberships',
            'analysis',
            'diets',
            'diets-report',
            'analysis-report',
            'users',
            'chat',
            'myProgress'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a roles
        $role1->givePermissionTo('routines', 'exercises', 'appointments', 'ticket', 'memberships', 'analysis', 'diets', 'diets-report', 'analysis-report', 'users', 'chat');
        $role2->givePermissionTo('routines', 'exercises', 'appointments', 'ticket', 'memberships', 'analysis', 'diets', 'diets-report', 'analysis-report', 'users', 'chat');
        $role3->givePermissionTo('appointments', 'analysis', 'diets', 'diets-report', 'analysis-report', 'chat');
        $role4->givePermissionTo('routines', 'exercises');
        $role5->givePermissionTo('appointments', 'routines', 'chat', 'myProgress');

    }
}
