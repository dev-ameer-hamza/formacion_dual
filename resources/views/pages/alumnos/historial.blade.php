@extends('layouts.app')

@section("content")

<div class="table-responsive text-nowrap">
    <!--Table-->
    <h2 class="mb-4">@lang("common.historialAcademico")</h2>
    <table class="table table-hover text-center">
      <!--Table head-->
      <thead class="table-dark">
        <tr>
          <th>@lang("common.año")</th>
          <th>@lang("common.grado")</th>
          <th>@lang("common.curso")</th>
          <th>@lang("common.empresa")</th>
          <th>@lang("common.notaFinal")</th>
          <th>@lang("common.tutorEmpresa")</th>
          <th>@lang("common.seguimiento")</th>
        </tr>
      </thead>

      <!--Table body-->
      <tbody>
        <tr>
          <td>2016-17</td>
          <td>DAW</td>
          <td>1</td>
          <td>IGOBIDE</td>
          <td>8</td>
          <td>Jon vadillo</td>
          <td>
            <a href="{{route('student.unhistorial')}}">
              <button  class="btn btn-outline-primary">Ver</button>
            </a>
          </td>
        </tr>
        <tr>
        <td>2019-20</td>
          <td>DAW</td>
          <td>2</td>
          <td>Maclaren</td>
          <td>6</td>
          <td>Jaime malvido </td>
          <td>
            <a href="{{route('student.unhistorial')}}">
              <button  class="btn btn-outline-primary">Ver</button>
            </a>
          </td>
        </tr>
        <tr>
          <td>2016-17</td>
          <td>DAW</td>
          <td>1</td>
          <td>IGOBIDE</td>
          <td>8</td>
          <td>Jon vadillo</td>
          <td>
            <a href="{{route('student.unhistorial')}}">
              <button  class="btn btn-outline-primary">Ver</button>
            </a>
          </td>
        </tr>
      </tbody>
    </table>


  </div>

@endsection
