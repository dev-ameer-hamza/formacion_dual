@extends('layouts.app')

@section("content")

<div class="table-responsive">
    <!--Table-->
    <div class="d-flex justify-content-between"> 
        <h2 class="mb-4">Detalle del seguimiento</h2>

        <a href="{{ route('student.seguimiento') }}">
            <button class="btn btn-dark font-weight-light"> Volver </button>
        </a>
        
    </div>
    
    <table class="table table-hover table-responsive mb-5">
        <tr>
            <th>Periodo</th>
            <td>{{ $seguimiento->date }}</td>
        </tr>
        <tr>
            <th>@lang("common.actividadesDesarrolladas")</th>
            <td>{{ $seguimiento->activities }}</td>
        </tr>
        <tr>
            <th>Reflexion </th>
            <td>{{ $seguimiento->reflection }}</td>
        </tr>
        <tr>
            <th>@lang("common.identificacionProblemas")</th>
            <td>{{ $seguimiento->problems }}</td>
        </tr>
      </tbody>
    </table>
  </div>
<h2 class="mt-6 mb-4">Comentarios</h2>
<div class="comentarios">
    @if(count($comentarios) != 0)
        @foreach($comentarios as $comentario)
            <p>{{ $comentario->comment }}</p>
        @endforeach
    @else
        <p>No hay comentarios</p>
    @endif
</div>
    
@endsection
