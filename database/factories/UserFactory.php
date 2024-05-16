<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'environment_id' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6']),
            'position_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'email_verified_at' => $this->faker->boolean ? now() : null,
            'password' => bcrypt('123456'), // Puedes cambiar 'password' por cualquier contraseña deseada
            'is_active' => $this->faker->boolean(50), // Probabilidad del 50% de que sea verdadero
            'remember_token' => Str::random(10),
            'subnet_id' => $this->faker->randomElement([1, 2, 3, 4])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}