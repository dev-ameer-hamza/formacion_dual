@extends('layouts.app')

@section("content")


<div class="table-responsive text-nowrap">
    <!--Table-->
    <h2 class="mb-4">@lang("common.notas")</h2>
    <table class="table table-hover text-center">
      <!--Table head-->
      <thead class="table-dark">
        <tr>
          <th>@lang("common.año")</th>
          <th>@lang("common.grado")</th>
          <th>@lang("common.curso")</th>
          <th>@lang("common.notaAcademica")</th>
          <th>@lang("common.notaEmpresa")</th>
          <th>@lang("common.notaFinal")</th>
        </tr>
      </thead>
      <!--Table body-->
      <tbody>
      @foreach ($resultados as $resultado)
          <tr>
            <td>{{ $resultado["ano"] }}</td>
            <td>{{ $resultado["grado"] }}</td>
            <td>{{ $resultado["curso"] }}</td>
            <td>
              @if( $resultado["nota_academica"]>4.9 )
                <strong class="text-success">{{ $resultado["nota_academica"] }}</strong>
              @else
                <strong class="text-danger">{{ $resultado["nota_academica"] }}</strong>
              @endif
            </td>
            <td>
                @if( $resultado["nota_empresa"]>4.9 )
                  <strong class="text-success">{{ $resultado["nota_empresa"] }}</strong>
                @else
                  <strong class="text-danger">{{ $resultado["nota_empresa"] }}</strong>
                @endif
            </td>
            <td>
                @if( $resultado["nota_final"]>4.9 )
                  <strong class="text-success">{{ $resultado["nota_final"] }}</strong>
                @else
                  <strong class="text-danger">{{ $resultado["nota_final"] }}</strong>
                @endif
            </td>
          </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>

@endsection

