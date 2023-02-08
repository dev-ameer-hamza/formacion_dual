@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
@section("content")
<div class="table-responsive">
    <!--Table-->
    <h2 class="mb-4">@lang("common.comentarioSeguimiento")</h2>
    <table class="table table-hover table-responsive mb-5">
        <tr>
            <th>@lang("common.alumno")</th>
            <td>{{ $seguimiento->alumno->name }} {{ $seguimiento->alumno->surname }}</td>
        </tr>
        <tr>
            <th>@lang("common.periodo")</th>
            <td>{{ $seguimiento->date }}</td>
        </tr>
        <tr>
            <th>@lang("common.actividadesDesarrolladas")</th>
            <td>{{ $seguimiento->activities }}</td>
        </tr>
        <tr>
            <th>@lang("common.reflexion")</th>
            <td>{{ $seguimiento->reflection }}</td>
        </tr>
        <tr>
            <th>@lang("common.identificacionProblemas")</th>
            <td>{{ $seguimiento->problems }}</td>
        </tr>
      </tbody>
    </table>
  </div>


    <form class="mx-0" action="{{ route('comentario.store',['id' => $seguimiento->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="comentario"><h4>@lang("common.comentario")</h4></label>
            <textarea class="form-control" id="comentario" rows="3" name="comentario"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">@lang("common.enviar")</button>
    </form>

  @endsection
