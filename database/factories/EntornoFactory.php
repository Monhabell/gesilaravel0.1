<?php

namespace Database\Factories;

use App\Models\Entorno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entorno>
*/ 
class EntornoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Aquí puedes especificar una lista de los entornos deseados
        $environments = [
            'Gesi',
            'Hogar',
            'Laboral',
            'Educativo',
            'Comunitario',
            'Institucional',
        ];

        // Selecciona uno de los entornos de la lista de forma aleatoria
        return [
            'entorno' => $this->faker->randomElement($environments),
        ];
    }

    public function createAll()
    {
        // Aquí puedes especificar una lista de los entornos deseados
        $environments = [
            'Gesi',
            'Hogar',
            'Laboral',
            'Educativo',
            'Comunitario',
            'Institucional',
        ];

        foreach ($environments as $environment) {
            Entorno::create([
                'entorno' => $environment
            ]);
        }
    }
}
