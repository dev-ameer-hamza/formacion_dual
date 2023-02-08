<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $password = "alumno";
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastname(),
            'dni' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'tel' => fake()->phoneNumber(),
            'birth_date' => now(),
            'formacion_dual' => fake()->boolean(),
            'password' => Hash::make($password),
        ];
    }
}
