<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoEmpresa;
use Illuminate\Http\Request;
use App\Http\Requests\SeguimientoEmpresaRequest;
use App\Models\Alumno;
use App\Models\TutorEmpresa;
use Illuminate\Support\Facades\Auth;

class SeguimientoEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $tutorAlumno=Auth::guard('empresa')->user();
        $alumnos = $tutorAlumno->alumnos()->wherePivot('end_date',null)->get();
       */
        $tutorAlumno=Auth::guard('empresa')->user() ;
        $alumnos = $tutorAlumno->alumnos;
       
        //$contenido=$alumnos->where('empresa_id',$tutorAlumno->empresa_id )->pluck($alumnos->id);

        return view('pages.tutor_empresa.seguimiento',['alumnos' => $alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguimientoEmpresaRequest $request)
    {
        $validated = $request->validated();
        //$tutor_empresa = auth()->guard('empresa')->user()->id;

        $st = SeguimientoEmpresa::create([
            'alunmo_id' => $validated['alumno_id'], 
            'tutor_empresa_id' => Auth::guard('empresa')->user()->id,
            'observation' => $validated['observacion'],
            'grade' => $validated['nota'],
        ]);

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $seguimientos=SeguimientoEmpresa::where('tutor_empresa_id',Auth::guard('empresa')->user()->id)->get();
        $resultado = [];
        foreach($seguimientos as $seguimiento)
        {
            $alumno = Alumno::whereId($seguimiento->alunmo_id)->first();
            array_push($resultado, [
                "seguimiento" => $seguimiento,
                "alumno" => $alumno->name . " " . $alumno->surname,
            ]);
        }
        
        return view('pages.tutor_empresa.historialseguimiento',['seguimientos' => $resultado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
