<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\EntornoFactory;
use Database\Factories\PositionsFactory;
use Database\Factories\SubnetFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Crear cargos
        PositionsFactory::new()->createAll();

        //Crear subredes
        SubnetFactory::new()->createAll();

        // Crear entornos
        EntornoFactory::new()->createAll();

        // Crear 5 usuarios
        User::factory()->count(5)->create();
    }
}