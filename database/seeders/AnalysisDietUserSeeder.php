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
            $analysisIds = $analyses->random(10)->pluck('id')->toArray();
            $dietId = $diets->random()->id;

            $user->analyses()->sync(
                array_fill_keys($analysisIds, ['diet_id' => $dietId, 'created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
