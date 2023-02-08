@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")

<div class="table-responsive text-nowrap">
    <!--Table-->
    <div class="d-flex justify-content-between"> 
        <h2 class="mb-4">Mis seguimientos</h2>

        <a href="{{ route('student.crearSeguimiento') }}">
            <button class="btn btn-outline-success">Crear nuevo seguimiento</button>
        </a>
        
    </div>
    <table class="table table-hover text-center">
      <!--Table head-->
      <thead class="table-dark">
        <tr>
          <th>Periodo</th>
          <th>Actividades desarrolladas</th>
          <th>Reflexion</th>
          <th>Problemas</th>
          <th>Comentarios del tutor</th>
        </tr>
      </thead>
      <!--Table body-->
      <tbody>
      @foreach ($seguimientos as $seguimiento)
          <tr>
            <td>{{ $seguimiento->date }}</td>
            <td>{{ $seguimiento->activities }}</td>
            <td>{{ $seguimiento->reflection }}</td>
            <td>{{ $seguimiento->problems }}</td>
            <td>
                <a href="{{route('show.detalle_seguimiento',['id'=>$seguimiento->id]) }}">
                  <button  class="btn btn-outline-primary">Ver</button>
                </a>
            </td>
          </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>



  


@endsection
