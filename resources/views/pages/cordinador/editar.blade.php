@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section('css')
<style>
      .form-control[type="number"] {
        width: 75px;
      }
      .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  </style>
@endsection
@section("content")

<div class="container mt-5">
  <h1 class="text-center mb-5">Datos de Alumno</h1>
  <form class="mx-auto w-50" action="{{ route('cordinador.store.alumno',[$alumno]) }}" method="post">
    @csrf
    <div class="form-group row">
      <div class="col-sm-6">
        <label for="nombre_alumno">Nombre</label>
        <input type="text" class="form-control" id="nombre_alumno" name="nombre" value="{{$alumno->name}}">
      </div>
      <div class="col-sm-6">
        <label for="apellido_alumno">Apellido</label>
        <input type="text" class="form-control" id="apellido_alumno" name="apellido" value="{{$alumno->surname}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="dni_alumno">DNI</label>
        <input type="text" class="form-control" id="dni_alumno" name="dni" value="{{$alumno->dni}}">
      </div>
      <div class="col-sm-6">
        <label for="email_alumno">Email</label>
        <input type="email" class="form-control" id="email_alumno" name="email" value="{{$alumno->email}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="telefono_alumno">Teléfono</label>
        <input type="text" class="form-control" id="telefono_alumno" name="telefono" value="{{$alumno->tel}}">
      </div>
      <div class="col-sm-6">
        <label for="curso_alumno">Curso</label>
        <select name="curso" class="form-control">
          @foreach($grado->cursos as $gCurso)
            <option value="{{ $gCurso->id }}" @if($gCurso->id == $curso->id) selected @endif>{{ $gCurso->name }}</option>
            @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="tutorUniversidad">Tutor Universidad</label>
        <select name="tutorUniversidad" class="form-control">
          @foreach($tutoresAcademicos as $tAcademico)
            <option value="{{ $tAcademico->id }}" @if($tAcademico->id == $tutorAcademico->id) selected @endif>{{ $tAcademico->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="empresa">Empresa</label>
        <select name="empresa" class="form-control" id="empresa" onchange="getTutors()" onload="getTutors">
          @foreach($empresas as $empresa)
            <option value="{{ $empresa->id }}" @if($empresa->id == $tutorEmpresa->empresa->id) selected @endif>{{$empresa->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-6">
        <label for="TutorEmpresa">Tutor Empresa</label>
        <select name="tutor_empresa" id="tutor_empresa" class="form-control">
                <option value="{{ $tutorEmpresa->id }}"  selected >{{ $tutorEmpresa->name }}</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <input type="checkbox" class="form-checkbox" id="desactivar" name="desactivar" @if(!$alumno->is_dual) checked @endif>
      <label for="desactivar">Formacion Dual</label>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
  </form>
</div>
@endsection
@push('scripts')
  <script>



    async function getTutors()
    {
      let empresa = document.getElementById('empresa');
      let empresa_id = empresa.value;

      let tut_empresa = document.getElementById('tutor_empresa');

      await fetch('{{route('empresa.tutores')}}',{
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          'id': empresa_id,
          "_token": "{{ csrf_token() }}",
        }),
        'credentials': 'same-origin'
      })
      .then(res => res.json())
      .then(data => {
        data.forEach(tutor => {

          removeOptions();

          var opt = document.createElement('option');
          opt.value = tutor.id;
          opt.innerHTML = tutor.name;
          tut_empresa.appendChild(opt);
        })
      })
    }

    function removeOptions()
    {
      var options = document.querySelectorAll('#tutor_empresa option');
      options.forEach(o => o.remove());
    }
  </script>
  @endpush
