<?php

namespace Database\Factories;
use App\Models\Positions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessResult;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PositionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = [
            'Técnico de sistemas',
            'Técnico administrativo',
            'Ingeniero',
            'Referente',
            'Digitador'
        ];

        return [
            'name' => $this->faker->randomElement($positions)
        ];
    }

    public function createAll()
    {
        $positions = [
            'Técnico de sistemas',
            'Técnico administrativo',
            'Profesional de apoyo',
            'Ingeniero',
            'Referente',
            'Digitador'
        ];

        foreach ($positions as $position){
            Positions::create([
                'name' => $position
            ]);
        }
    }
}