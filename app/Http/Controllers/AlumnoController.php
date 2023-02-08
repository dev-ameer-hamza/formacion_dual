<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Curso;

class AlumnoController extends Controller
{
    public function index()
    {
        //Vista de notas
        $alumno = Auth::guard('alumno')->user();
        $alum = Alumno::whereId($alumno->id)->with(['grados','cursos','evaluaciones'])->first();
        
        $evaluaciones = $alum->evaluaciones;

        $resultado = [];

        foreach($evaluaciones as $evaluacion)
        {
            $curso = Curso::whereId($evaluacion->curso_id)->first();
            $grado = Grado::whereId($curso->grado_id)->first();
               

            array_push($resultado, [
                "ano" => $evaluacion->year,
                "nota_academica" => $evaluacion->grade_academic,
                "nota_empresa" => $evaluacion->grade_empresa,
                "nota_final" => $evaluacion->final_grade,
                "curso" => $curso->nivel,
                "grado" => $grado->name,
            ]);
        }
       
        return view('pages.alumnos.notas', [
            "resultados" => $resultado,
        ]);
    }

    public function mostrarSeguimientos()
    {
        //Vista de los seguimientos del alumno
        $alumno = Auth::guard('alumno')->user();

        //datos de los seguimientos
        $seguimientos = $alumno->alumnoSeguimientos;
        //dd($seguimientos);
        return view("pages.alumnos.seguimiento", [
            "seguimientos" => $seguimientos,
        ]);
    }
}

//año grado notas