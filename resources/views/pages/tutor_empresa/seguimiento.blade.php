@extends('layouts.app')



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")

<div class="container mt-5">
    <h2 class="text-center mb-5">@lang("common.calificacionAlumnos")</h2>
    <form class="mx-auto" style="max-width: 500px;" action="{{ route('tutor-empresa.store.ficha_seguimiento') }}" method="post">
    @csrf
        <div class="form-group">
            <label for="alumnos">@lang("common.alumnos")</label>
            <select class="form-control" id="alumnos" name="alumno_id">

              <option value="null">@lang("common.seleccionaAlumno")</option>
              @foreach($alumnos as $alumno )
              <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
              @endforeach
            </select>
          </div>
      <div class="form-group">
        <label for="observacion">@lang("common.observacion")</label>
        <textarea class="form-control" id="observacion" rows="3" name="observacion" value="{{ old('observacion') }}"></textarea>
      </div>
      <div class="form-group">
        <label for="nota">@lang("common.nota")</label>
        <input type="number" class="form-control w-50" id="nota" name="nota">
      </div>
      <button type="submit" class="btn btn-primary btn-block">@lang("common.enviar")</button>
    </form>
</div>

@endsection
