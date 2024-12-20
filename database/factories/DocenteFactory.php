<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docentes>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'direccion' => fake()->address(),
            'departamento' => fake()->randomElement(['Administración', 'Comercio', 'Informática', 'Relaciones con las empresas', 'DIOP', 'Innovación']),
        ];
    }
}
