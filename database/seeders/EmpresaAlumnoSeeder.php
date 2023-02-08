<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaAlumnoSeeder extends Seeder
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
            DB::table('alumno_empresa')->insert([
                'alumno_id' => fake()->numberBetween(1,3),
                'empresa_id' => fake()->numberBetween(1,10),
                'start_date' => fake()->date()
            ]);
        }
    }
}
