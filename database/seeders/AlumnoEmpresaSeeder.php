<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Alumno::all()  as $alumno){
            DB::table('alumno_empresa')
                ->insert([
                    'alumno_id' => $alumno->id,
                    'empresa_id' => fake()->numberBetween(1,10),
                    'start_date' => now()
                ]);
        }
    }
}
