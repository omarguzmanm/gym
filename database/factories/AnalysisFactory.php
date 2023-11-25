<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Analysis>
 */
class AnalysisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'age' => $this->faker->randomNumber(2),
            'gender' => $this->faker->randomElement(['masculino', 'femenino']),
            'weight' => $this->faker->randomFloat(2, 50, 150),
            'height' =>$this->faker->randomFloat(2,135, 210),
            'imc'   => $this->faker->randomFloat(2, 13, 80),
            'activity' => $this->faker->randomElement(['baja', 'media', 'alta', 'superAlta']),
            'goal' => $this->faker->randomElement(['Perdida de peso', 'Ganancia muscular', 'Mantenimiento de peso', 'Mejora de salud']),
            'regularly_consumed' => $this->faker->randomElement(['Refresco de cola', 'Galletas', 'Papas fritas', 'Helado', 'Pizza', 'Chocolate', 'Donas', 'Bollería', 'Caramelos', 'Fast food']),
            'notes' => $this->faker->randomElement(['Intolerancia a la lactosa', 'Enfermedad celíaca', 'Diabetes tipo 2', 'Hipercolesterolemia', 'Hipertensión', 'Obesidad', 'Trastornos alimentarios (anorexia, bulimia, trastorno por atracón)', 'Síndrome del intestino irritable (SII)', 'Hipotiroidismo', 'Hipertiroidismo', 'Insuficiencia renal', 'Gastritis', 'Reflujo gastroesofágico', 'Alergias alimentarias', 'Vegetarianismo', 'Veganismo'])
        ];
    }
}
