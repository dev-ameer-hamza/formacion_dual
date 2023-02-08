<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfesoradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $password = "profesorado";
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'dni' => fake()->unique()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'tel' => fake()->phoneNumber(),
            'area' => fake()->word() ,
            'password' => Hash::make($password),
        ];
    }
}
