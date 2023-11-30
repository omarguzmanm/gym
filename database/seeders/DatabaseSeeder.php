<?php

namespace Database\Seeders;

use App\Models\Analysis;
use App\Models\Appointment;
use App\Models\Diet;
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

        User::factory(100)->create(); 
        
        $this->call([
            AppointmentSeeder::class,
            DietSeeder::class,
            AnalysisSeeder::class,
            AnalysisDietUserSeeder::class,
            MembershipSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserRoleSeeder::class,
            ExerciseSeeder::class,
            RoutineSeeder::class,
            ExerciseRoutineUserSeeder::class,
            FoodSeeder::class, //Este proceso puede demorar - importar solo si se hara uso de dietas
            DietFoodSeeder::class,
            PrRecordSeeder::class,
            RatingSeeder::class
        ]);
    }
}