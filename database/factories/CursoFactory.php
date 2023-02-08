<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            "grado_id" => fake()->numberBetween(1,7),
            'name' => fake()->unique()->word(),
            'nivel' => fake()->numberBetween(1,4)
        ];
    }
}
