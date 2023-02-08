@extends('layouts.app')



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")
<div class="table-responsive text-nowrap">
    <!--Table-->
    <div class="d-flex justify-content-between"> 
        <h2 class="mb-4">Seguimiento del tutor de la empresa</h2>

        <a href="{{ route('tutor_empresa.nuevo_seguimiento') }}">
            <button class="btn btn-outline-success">Crear nuevo seguimiento</button>
        </a>
        
    </div>

    <table class="table table-hover text-center">
    
      <!--Table head-->
      <thead class="table-dark">
        <tr>
          <th>Alumno</th>
          <th>Observacion</th>
          <th>Nota</th>
        </tr>
      </thead>
      <!--Table body-->
      <tbody>
        @foreach($seguimientos as $seguimiento )
            <tr>
                    <td> {{ $seguimiento["alumno"] }} </td>
                    <td>{{ $seguimiento["seguimiento"]["observation"] }}</td>
                    <td>{{ $seguimiento["seguimiento"]["grade"] }}</td>
          </tr> 
          @endforeach
      </tbody>
    </table>

@endsection
