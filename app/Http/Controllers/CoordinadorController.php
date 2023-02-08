<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Grado;
use App\Models\Profesorado;
use App\Models\Rol;
use App\Models\TutorEmpresa;
use Illuminate\Http\Request;
use App\DataTables\ProfesoradoTable;
use App\DataTables\AlumnosTable;
use App\DataTables\TutorEmpresaTable;
use Illuminate\Support\Facades\DB;

class CoordinadorController extends Controller
{
    public function profesorados(ProfesoradoTable $profesoradoTable)
    {
        return $profesoradoTable->render('pages.cordinador.profesorado');
    }

    public function editProfesorado(Profesorado $profesorado)
    {
        $activeRols = $profesorado->activeRols()->get();
        //dd($activeRols);
        $rols = Rol::all();
        $activeGrado = null;
        if ($profesorado->isCoordinador())
        {
            $activeGrado = $profesorado->activeGrado()->first();
        }
        $grados = Grado::all();
        return view('pages.cordinador.editarProfesorado',compact('grados','activeRols','rols','profesorado','activeGrado'));
    }

    public function storeProfesorado(Request $request,Profesorado $profesorado)
    {
        DB::beginTransaction();
        try {
            $profesorado->update([
                'name' => $request->nombre,
                'surname' => $request->apellido,
                'dni' => $request->dni,
                'email' => $request->email,
                'tel' => $request->telefono
            ]);

            if ($request->grado)
            {
                $profesorado->grados()->sync($request->grado);
            }

            if ($request->rols)
            {
                $activeRols = $profesorado->activeRols()->get();
                foreach($request->rols as $rol)
                {
                $profesorado->rols->each(function ($rol) {
                    $rol->pivot->end_date = now();
                    $rol->pivot->save();
                });
            }
                $profesorado->rols()->attach($request->rols,['start_date' => now()]);
            }

            DB::commit();
            return redirect()->route('cordinador.profesorado');
        }
        catch(\Exception $e)
        {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function alumnos(AlumnosTable $alumnosTable)
    {
        return $alumnosTable->render('pages.cordinador.alumno');
    }

    public function editAlumno(Alumno $alumno)
    {
        $curso = $alumno->activeCurso()->first();
        $tutorAcademico = $alumno->activeTutor()->first();
        $tutorEmpresa = $alumno->activeTutorEmpresa()->first();
        $grado = $alumno->activeGrado()->first();
        $tutoresAcademicos = Rol::whereName('tutor')->first()->profesorados;
        $empresas = Empresa::all();

        return view('pages.cordinador.editar',compact('alumno','grado','curso','tutorAcademico','tutorEmpresa','tutoresAcademicos','empresas'));
    }

    public function storeAlumno(Request $request,Alumno $alumno)
    {

        $curso = $alumno->activeCurso()->first();
        $tutorAcademico = $alumno->activeTutor()->first();
        $tutorEmpresa = $alumno->activeTutorEmpresa()->first();

        DB::beginTransaction();
        try {

            if ($curso->id != $request->curso) {
                $alumno->cursos->each(function ($curso) {
                    $curso->pivot->end_date = now();
                    $curso->pivot->save();
                });

                $alumno->cursos()->attach($request->curso,['start_date' => now()]);
            }

            if ($tutorAcademico->id != $request->tutorUniversidad) {
                $alumno->tutores->each(function ($profe) {
                    $profe->pivot->end_date = now();
                    $profe->pivot->save();
                });

                $alumno->tutores()->attach($request->tutorUniversidad,['start_date' => now()]);
            }

            if ($tutorEmpresa->id != $request->tutor_empresa) {
                $alumno->tutorEmpresas->each(function ($empresa) {
                    $empresa->pivot->end_date = now();
                    $empresa->pivot->save();
                });

                $alumno->tutorEmpresas()->attach($request->tutor_empresa,['start_date' => now()]);
            }

            $alumno->update([
                'name' => $request->nombre,
                'surname' => $request->apellido,
                'dni' => $request->dni,
                'tel' => $request->telefono,
                'formacion_dual' => $request->desactivar == 'on' ? 1 : 0
            ]);
            DB::commit();
            return redirect()->route('cordinador.alumno');
        }
        catch(\Exception $e)
        {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }


    }

    public function tutoresEmpresa(TutorEmpresaTable $tutorEmpresaTable)
    {
        return $tutorEmpresaTable->render('pages.cordinador.tutorEmpresa');
    }

    public function tutoresEmpresaAll(Request $request)
    {
        $empresa = Empresa::find($request->id);

        $tutores = $empresa->tutores;

        echo json_encode($tutores);
    }

    public function editTutorEmpresa(TutorEmpresa $tutor)
    {
        return view('pages.cordinador.editarTutorEmpresa',compact('tutor'));
    }

    public function storeTutorEmpresa(Request $request,TutorEmpresa $tutor)
    {
        try {

            $tutor->update([
                'name' => $request->nombre,
                'surname' => $request->apellido,
                'email' => $request->email,
                'telefone' => $request->telefono,
            ]);

            return redirect()->route('cordinador.tutorEmpresa');
        }
        catch(\Exception $e)
        {
            return redirect()->back();
        }
    }
}
