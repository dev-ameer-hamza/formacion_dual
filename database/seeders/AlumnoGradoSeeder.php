<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Alumno::all()  as $alumno){
            DB::table('alumno_grado')
                ->insert([
                    'alumno_id' => $alumno->id,
                    'grado_id' => fake()->numberBetween(1,7),
                    'start_date' => now()
                ]);
        }

    }
}
