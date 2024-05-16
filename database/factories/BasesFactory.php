<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class BasesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bases = [
            'names' => ['CSA', 'Sesiones colectivas', 'NNA', 'Escala abreviada', 'Prevención del embarazo'],
            'timeHead' => [7, 5, 6, 5, 8],
            'timeSeg' => [2, 6, 6, 9, 8],
            'environment' => [2, 3, 4, 5, 6]
        ];

        return [
            'nombrebase' => $this->faker->randomElement($bases['names']),
            'tiempoencabezado' => $this->faker->randomElement($bases['timeHead']),
            'tiempoindseg' => $this->faker->randomElement($bases['timeSeg']),
            'entorno_id' => $this->faker->randomElement($bases['environment'])
        ];
    }
}
