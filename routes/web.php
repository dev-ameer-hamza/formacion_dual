<?php

use App\Http\Controllers\SeguimientoAlumnoController;
use Illuminate\Support\Facades\Route;

use App\Mail\SendMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\SeguimientoTutorController;
use App\Http\Controllers\SeguimientoEmpresaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ContrasenaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* * * * * * * * * * * * * * * * * * * * * * * * * * * *
*                  Routes Or Ameer - Start             *
* * * * * * * * * * * * * * * * * * * * * * * * * * * */
Route::middleware('auth:alumno')->group(function(){

// Alumno
Route::get('/notas', [AlumnoController::class,'index'])->name('student.notas');

// Seguimiento alumno
Route::get('/seguimiento', [AlumnoController::class,'mostrarSeguimientos'])->name('student.seguimiento');
Route::get('/alumno/crear-seguimiento', [SeguimientoAlumnoController::class,'index'])->name('student.crearSeguimiento');
Route::post('/store/seguimiento', [SeguimientoAlumnoController::class,'store'])->name('student.store.seguimiento');
//Mostrar detalle del seguimiento
Route::get('/alumno/detalle_seguimiento', [SeguimientoAlumnoController::class,'mostrarDetalleSeguimiento'])->name('show.detalle_seguimiento');

//borrado de seguimiento
Route::delete('/destroy/seguimiento/{id}', [SeguimientoAlumnoController::class,'destroy'])->name('student.destroy.historial');
//ir a edicion de seguimiento
Route::get('/seguimiento/{id}', [SeguimientoAlumnoController::class,'edit'])->name('student.edit.seguimiento');
//ir a edicion de seguimiento
Route::post('/update/seguimiento/{id}', [SeguimientoAlumnoController::class,'update'])->name('student.update.seguimiento');
// Historial alumno
Route::get('/historial',  [HistorialController::class,'index'])->name('student.historial');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// Historial alumno
Route::get('/unhistorial',  [SeguimientoAlumnoController::class,'show'])->name('student.unhistorial');

});

Route::middleware('auth:profesorado')->group(function(){

    // TUTOR

// Lista de los alumnos
Route::get('/tutor/alumnos-tutor', [TutorAcademicoController::class,'alumnos'])->name('tutor.alumnos');
// Lista de seguimientos
Route::get('/tutor/seguimiento-tutor', [TutorAcademicoController::class,'seguimiento'])->name('tutor.seguimientos');
// Comentar seguimientos
Route::get('/tutor/comentar-seguimiento/{id}', [TutorAcademicoController::class,'comentario'])->name('tutor.comentar');
Route::post('/tutor/comentar-seguimiento/{id}/sotre', [TutorAcademicoController::class,'comentarioStore'])->name('comentario.store');



//Seguimiento tutor
Route::get('/tutor/ficha-seguimiento', [SeguimientoTutorController::class,'create'])->name('tutor.ficha_seguimiento');
Route::post('/tutor/store/seguimiento-tutor', [SeguimientoTutorController::class,'store'])->name('tutor.store.ficha_seguimiento');
//Mostrar seguimiento de tutor
Route::get("/tutor/show/ficha-seguimiento", [SeguimientoTutorController::class,'show'])->name('tutor.show.ficha_seguimiento');

Route::post('/tutores/all',[CoordinadorController::class,'tutoresEmpresaAll'])->name('empresa.tutores');
//CORDINADOR

//Profesorado
Route::get('/cordinador/profesorados',[CoordinadorController::class,'profesorados'])->name('cordinador.profesorado');

Route::get('/cordinador/editar/profesorado/{profesorado}', [CoordinadorController::class,'editProfesorado'])->name('cordinador.editarProfesorado');
Route::post('cordinador/store/profesorado/{profesorado}',[CoordinadorController::class,'storeProfesorado'])->name('cordinador.store.profesorado');

//Alumno
Route::get('/cordinador/alumnos', [CoordinadorController::class,'alumnos'])->name('cordinador.alumno');

//Editar Alumno
Route::get('/cordinador/editar/alumno/{alumno}', [CoordinadorController::class,'editAlumno'])->name('cordinador.editar');
Route::post('/cordinador/alumno/{alumno}/store', [CoordinadorController::class,'storeAlumno'])->name('cordinador.store.alumno');

Route::get('/cordinador/tutor-empresa', [CoordinadorController::class,'tutoresEmpresa'])->name('cordinador.tutorEmpresa');

Route::get('/cordinador/editar/tutor-empresa/{tutor}',[CoordinadorController::class,'editTutorEmpresa'])->name('cordinador.editarTutorEmpresa');
Route::post('cordinador/store/tutor-empresa/{tutor}',[CoordinadorController::class,'storeTutorEmpresa'])->name('cordinador.store.tutor.empresa');

});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::middleware('auth:empresa')->group(function(){

//SEGUIMIENTO EMPRESA
Route::get('/tutor-empresa/ficha-seguimiento', [SeguimientoEmpresaController::class,'show'])->name('tutor_empresa.ficha_seguimiento');
Route::get('/tutor-empresa/nuevo-seguimiento', [SeguimientoEmpresaController::class,'create'])->name('tutor_empresa.nuevo_seguimiento');
Route::post('/tutor-empresa/store/seguimiento-tutor', [SeguimientoEmpresaController::class,'store'])->name('tutor-empresa.store.ficha_seguimiento');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

/* * * * * * * * * * * * * * * * * * * * * * * * * * * *
*                  Routes Or Ameer - End               *
* * * * * * * * * * * * * * * * * * * * * * * * * * * */


//Login
Route::get('/login',function(){ return redirect('/'); });
Route::get('/', [LoginController::class,'loginForm'])->name('login');

Route::post('/login',[LoginController::class,'login'])->name('login');

//Te has olvidado la contraseña
Route::get('/recovery-password', [LoginController::class,'recuperarPassword'])->name('recovery');

//HOME

// Ajustes
Route::get('/ajustes', [\App\Http\Controllers\AjustesController::class,'editAjustes'])->name('ajustes');


Route::get('/login/send-email', [ContrasenaController::class,'recuperarContrasena'])->name('send-email');


Route::get('/home', [\App\Http\Controllers\HomeController::class,'home'])->name('home');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');
