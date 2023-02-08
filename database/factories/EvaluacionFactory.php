<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluacion>
 */
class EvaluacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'final_grade' => fake()->numberBetween(1, 10),
            'year' => fake()->numberBetween(2005, 2022),
            "alumno_id" => fake()->numberBetween(1, 3),
            "curso_id" => fake()->numberBetween(1, 7),
            "grade_empresa" => fake()->numberBetween(1, 10),
            "grade_academic" => fake()->numberBetween(1, 10),

        ];
    }
}
