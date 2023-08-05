<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'superAdministrador']);
        $role2 = Role::create(['name' => 'administrador']);
        $role3 = Role::create(['name' => 'nutriologo']);
        $role4 = Role::create(['name' => 'entrenador']);

        $user = User::find(101);
        $user2 = User::find(102);
        $user->assignRole($role1);
        $user2->assignRole($role2);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
