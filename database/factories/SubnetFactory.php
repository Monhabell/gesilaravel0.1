<?php

namespace Database\Factories;

use App\Models\Subnets;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubnetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Aquí puedes especificar una lista de los entornos deseados
        $subnets = [
            'Norte',
            'Centro oriente',
            'Sur occidente',
            'Sur',
        ];

        // Selecciona uno de los entornos de la lista de forma aleatoria
        return [
            'name' => $this->faker->randomElement($subnets),
        ];
    }

    public function createAll()
    {
        // Aquí puedes especificar una lista de los entornos deseados
        $subnets = [
            'Norte',
            'Centro oriente',
            'Sur occidente',
            'Sur',
        ];

        foreach ($subnets as $subnet) {
            Subnets::create([
                'name' => $subnet
            ]);
        }
    }
}
