<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProfesoradoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $ite)
        {
            DB::table('profesorado_rol')->insert([
                'rol_id' => fake()->numberBetween(1,2),
                'profesorado_id' => fake()->numberBetween(1,10),
                'start_date' => fake()->date()
            ]);
        }
    }
}
