<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Exercise;
use App\Models\PrRecord;
use App\Models\Rating;
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
        Appointment::factory(200)->create();
        
        $this->call([
            MembershipSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserRoleSeeder::class,
            ExerciseSeeder::class,
            RoutineSeeder::class,
            ExerciseRoutineUserSeeder::class,
            FoodSeeder::class, //Este proceso puede demorar - importar solo si se hara uso de dietas
        ]);

        PrRecord::factory(2000)->create();
        Rating::factory(1000)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}