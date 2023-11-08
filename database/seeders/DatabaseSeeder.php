<?php

namespace Database\Seeders;

use App\Models\Exercise;
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

        User::factory(100)->create(); //Si queremos ver mejor las graficas, poner menos usuarios
        $this->call([
            AppointmentSeeder::class,
            MembershipSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserRoleSeeder::class,
            ExerciseSeeder::class,
            RoutineSeeder::class,
            ExerciseRoutineUserSeeder::class,
            PrRecordSeeder::class,
            FoodSeeder::class, //Este proceso puede demorar - importar solo si se hara uso de dietas
            RatingSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}