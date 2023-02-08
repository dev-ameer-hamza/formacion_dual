<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Alumno;
use App\Models\Profesorado;

class LoginController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if($request->radioRol === 'tutorEmpresa')
        {
            return $this->loginTutorEmpresa($validated);
        }
        else if($request->radioRol === 'tutorCoordinador'){
            return $this->loginProfesorado($validated);
        }
        else{
            return $this->loginAlumno($validated);
        }
    }

    private function loginTutorEmpresa($data)
    {
        Auth::guard('empresa');
        $empresa = Auth::guard('empresa')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);


        if(Auth::guard('empresa')->user())
        {
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->withInput()->withErrors(['login_error' => 'La contraseña o el correo es incorrecto']);
        }
    }

    private function loginAlumno($data){

        Auth::guard('alumno');
        $alumno = Auth::guard('alumno')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        if(Auth::guard('alumno')->user())
        {
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->withInput()->withErrors(['login_error' => 'La contraseña o el correo es incorrecto']);
        }

    }

    public function logout(Request $request)
    {

        if(Auth::guard('alumno')->check())
        {
            Auth::guard('alumno')->logout();
            $request->session()->invalidate();
            return redirect('/');

        }
        if(Auth::guard('profesorado')->check())
        {
            Auth::guard('profesorado')->logout();
            $request->session()->invalidate();
            return redirect('/');
        }
        if(Auth::guard('empresa')->check())
        {
            Auth::guard('empresa')->logout();
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function recuperarPassword()
    {
        return view('auth.recoverypass');
    }

    private function loginProfesorado($data){
        Auth::guard('profesorado');
        $profe = Auth::guard('profesorado')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        if(Auth::guard('profesorado')->user())
        {
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->withInput()->withErrors(['login_error' => 'La contraseña o el correo es incorrecto']);
        }
    }
}
