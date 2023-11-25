<?php

namespace Database\Seeders;

use App\Models\Diet;
use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DietFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Selecciona diets y foods de manera aleatoria
        $diets = Diet::inRandomOrder()->get();
        $foods = Food::inRandomOrder()->get();

        // Itera sobre los diets y utiliza attach para establecer relaciones en la tabla pivote
        foreach ($diets as $diet) {
            // Crea tres registros con el mismo diet_id y diferentes valores para el atributo name
            $diet->foods()->attach(
                $foods->random()->id,
                ['name' => 'desayuno', 'created_at' => now(), 'updated_at' => now()]
            );
            $diet->foods()->attach(
                $foods->random()->id,
                ['name' => 'colación 1', 'created_at' => now(), 'updated_at' => now()]
            );
            $diet->foods()->attach(
                $foods->random()->id,
                ['name' => 'comida', 'created_at' => now(), 'updated_at' => now()]
            );
            $diet->foods()->attach(
                $foods->random()->id,
                ['name' => 'colación 2', 'created_at' => now(), 'updated_at' => now()]
            );
            $diet->foods()->attach(
                $foods->random()->id,
                ['name' => 'cena', 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
