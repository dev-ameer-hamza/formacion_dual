<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutorEmpresa>
 */
class TutorEmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $password = "empresa";
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastname(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'expertise' => fake()->title(),
            'password' => Hash::make($password),
            'empresa_id' => fake()->unique()->numberBetween(1,10)
        ];
    }
}
