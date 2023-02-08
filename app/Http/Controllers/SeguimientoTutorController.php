<?php

namespace App\Http\Controllers;

use App\DataTables\SeguimientoTutorTable;
use App\Models\SeguimientoTutor;
use Illuminate\Http\Request;
use App\Http\Requests\SeguimientoTutorRequest;
use App\Models\Profesorado;
use Illuminate\Support\Facades\Auth;

class SeguimientoTutorController extends Controller
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
     */
    public function create()
    {
        $tutor = Auth::guard('profesorado')->user();
        $alumnos = $tutor->alumnos;
        return view('pages.tutor.ficha_seguimiento',compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(SeguimientoTutorRequest $request)
    {
        $asis = implode(',',$request->asistentes);
        
        
        $validated = $request->validated();
        $tutor = Auth::guard('profesorado')->user();
        try {
            $tutor->tutorSeguimientos()->create(
                [
                    'alumno_id' => $validated['alumno_id'],
                    'date' => $validated['fecha'],
                    'asistents' => $asis,
                    'tutorial_type' => $validated['tipo_tutoria'],
                    'objectives' => $validated['objetivo'],
                    'decisions' => $validated['decision'],
                    'note' => $validated['nota'],
                ]
            );
            return redirect()->route("home");

        }
        catch(\Exception $e){
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SeguimientoTutorTable $seguimientoTutorTable)
    {
        return $seguimientoTutorTable->render('pages.tutor.mis_seguimientos');

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
