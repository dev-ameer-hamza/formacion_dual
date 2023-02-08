@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


@section("content")

<div class="container mt-5">
    <h2 class="text-center mb-5">@lang("common.fichaSeguimiento")</h2>
    <form class="mx-auto" style="max-width: 500px;" action="{{ route('tutor.store.ficha_seguimiento') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="alumno_id">@lang("common.alumnos")</label>
            <select class="form-control" id="alumno_id" name="alumno_id" value="{{old('alumnos')}}">
              <option value="null">@lang("common.seleccionaAlumno")</option>
              @foreach($alumnos as $alumno)
                  <option value="{{ $alumno->id }}">{{ $alumno->surname }}, {{ $alumno->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">@lang("common.fecha")</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
        </div>



        <div class="form-group">
            <label for="asistentes">@lang("common.asistentes")</label>
            <select class="form-control" id="asistentes" name="asistentes[]" multiple value="{{old('asistentes')}}" size="3" >
              <option value="fa">FA</option>
              <option value="al">AL</option>
              <option value="fe">FE</option>
            </select>
        </div>


        <div class="form-group">
            <label for="tipo_tutoria">@lang("common.tipoTutoria")</label>
            <select class="form-control" id="tipo_tutoria" name="tipo_tutoria" value="{{old('tipo_tutoria')}}">
              <option value="null">@lang("common.seleccionaTipo") </option>
              <option value="telefonica">@lang("common.telefonica")</option>
              <option value="presencial">@lang("common.presencial")</option>
            </select>
        </div>

        <div class="form-group">
            <label for="objetivo">@lang("common.objetivosTutoria")</label>
            <textarea class="form-control" id="objetivo" rows="3" name="objetivo"></textarea>
        </div>
        <div class="form-group">
            <label for="decision">@lang("common.aspectosComentaodsDecisionesFuturasAcciones")</label>
            <textarea class="form-control" id="decision" rows="3" name="decision"></textarea>
        </div>


        <div class="form-group">
            <label for="nota">@lang("common.nota")</label>
            <input type="number" class="form-control w-50" id="nota" name="nota" value="{{old('nota')}}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">@lang("common.enviar")</button>
    </form>
</div>
@endsection
