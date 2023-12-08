<?php

namespace Database\Seeders;

use App\Models\Analysis;
use App\Models\Diet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalysisDietUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Selecciona usuarios, análisis y dietas de manera aleatoria
        $users = User::inRandomOrder()->get();
        $analyses = Analysis::inRandomOrder()->get();
        $diets = Diet::inRandomOrder()->get();
    
        // Itera sobre los usuarios y utiliza sync para establecer relaciones en la tabla pivote
        foreach ($users as $user) {
            // Selecciona 10 análisis y dietas diferentes de manera aleatoria
            $uniqueCombinations = collect();
            while ($uniqueCombinations->count() < 10) {
                $analysis = $analyses->pop();
                $diet = $diets->pop();
                $uniqueCombinations->push([$analysis->id, $diet->id]);
            }
    
            $syncData = [];
            // Creamos array asociativo [anaylisis => [diet,...]]
            foreach ($uniqueCombinations as $combination) {
                $syncData[$combination[0]] = ['diet_id' => $combination[1], 'created_at' => now(), 'updated_at' => now()];
            }
            // Asigna las 10 combinaciones únicas al usuario actual sin eliminar las existentes.
            $user->analyses()->syncWithoutDetaching($syncData);
        }
    }
    
    
    
}
