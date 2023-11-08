<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Routine::insert([
            [
                'id' => 1,
                'name' => 'Fuerza',
                'description' => 'Rutina enfocada en la fuerza',
                'level' => 'Avanzado',
                'duration' => 60,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:16:41',
                'updated_at' => '2023-10-21 07:47:16',
            ],
            [
                'id' => 2,
                'name' => 'Cuerpo completo',
                'description' => 'Rutina para personas que van empezando',
                'level' => 'Principiante',
                'duration' => 30,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:21:11',
                'updated_at' => '2023-10-21 07:21:11',
            ],
            [
                'id' => 3,
                'name' => 'Cuádriceps',
                'description' => 'Rutina centrada en cuádriceps',
                'level' => 'Avanzado',
                'duration' => 60,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:24:47',
                'updated_at' => '2023-10-21 07:24:47',
            ],
            [
                'id' => 4,
                'name' => 'Abdominales',
                'description' => 'Rutina para fortalecer el abdomen',
                'level' => 'Intermedio',
                'duration' => 45,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:40:59',
                'updated_at' => '2023-10-21 07:40:59',
            ],
            [
                'id' => 5,
                'name' => 'Hipertrofia',
                'description' => 'Rutina diseñada para el crecimiento muscular',
                'level' => 'Avanzado',
                'duration' => 75,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:43:10',
                'updated_at' => '2023-10-21 07:43:10',
            ],
            [
                'id' => 6,
                'name' => 'Espalda',
                'description' => 'Rutina enfocada en el desarrollo de la espalda.',
                'level' => 'Intermedio',
                'duration' => 50,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:44:29',
                'updated_at' => '2023-10-21 07:44:29',
            ],
            [
                'id' => 7,
                'name' => 'Glúteos y Femoral',
                'description' => 'Desarrollo de fuerza y potencia en gluteos y femorales',
                'level' => 'Intermedio',
                'duration' => 75,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:46:29',
                'updated_at' => '2023-10-21 07:46:29',
            ],
            [
                'id' => 8,
                'name' => 'Brazos',
                'description' => 'Rutina para tonificar y definir los brazos',
                'level' => 'Principiante',
                'duration' => 60,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:48:16',
                'updated_at' => '2023-10-21 07:48:16',
            ],
            [
                'id' => 9,
                'name' => 'Abdominales',
                'description' => 'Rutina para fortalecer los abdominales',
                'level' => 'Principiante',
                'duration' => 30,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:49:23',
                'updated_at' => '2023-10-21 07:49:23',
            ],
            [
                'id' => 10,
                'name' => 'Pectorales',
                'description' => 'Rutina para el desarrollo de los músculos pectorales',
                'level' => 'Intermedio',
                'duration' => 45,
                // 'rating' => 0.00,
                'created_at' => '2023-10-21 07:50:56',
                'updated_at' => '2023-10-21 07:50:56',
            ],
        ]);

    }
}
