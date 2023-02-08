@extends('layouts.app')

@section("content")
@vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

<section class="py-5 container" >
  <div class="text-center">
    <img src="{{ Vite::asset('resources/images/avatar.png') }}" alt="avatar" class="rounded-circle img-fluid mb-3" style="width: 150px;">
      @if(auth()->guard('alumno')->check())
      <h5>{{ $ajustes->name }}</h5>
       <p class="text-muted mb-1">Alumno</p>
        <div class="d-flex justify-content-center">
          <div class="card text-left w-50">
           <div class="card-body">
              <h5 class="card-title">Detalles de Contacto</h5>
             <hr>
              <p class="card-text">
                <strong>Nombre Completo:</strong> {{ $ajustes->name }} {{ $ajustes->surname }}<br>
                <strong>DNI:</strong> {{ $ajustes->dni }}<br>
                <strong>Email:</strong> {{ $ajustes->email }}<br>
                <strong>Telefono:</strong> {{ $ajustes->tel }}<br>
                <strong>Fecha de nacimiento:</strong> {{ $ajustes->birth_date }}<br>
                <strong>formacion dual actual?:</strong>
                @if ( $ajustes->formacion_dual )
                Si
                @endif
                @if (!$ajustes->formacion_dual )
                No
                @endif
              </p>
            </div>
          </div>
        </div>
      @endif

      @if(auth()->guard('profesorado')->check())
      <h5>{{ $ajustes->name }}</h5>
      <p class="text-muted mb-1">{{ $extra }} </p>
        <p class="text-muted mb-4"></p>
        <div class="d-flex justify-content-center">
          <div class="card text-left w-50">
            <div class="card-body">
              <h5 class="card-title">Detalles de Contacto</h5>
              <hr>
              <p class="card-text">
              <strong>Nombre Completo:</strong> {{ $ajustes->name }} {{ $ajustes->surname }}<br>
              <strong>DNI:</strong> {{ $ajustes->dni }}<br>
              <strong>Email:</strong> {{ $ajustes->email }}<br>
              <strong>Telefono:</strong> {{ $ajustes->tel }}<br>
              <strong>Grado:</strong> {{ $ajustes->area }}<br>
              </p>
            </div>
          </div>
        </div>
      @endif


      @if(auth()->guard('empresa')->check())
      <h5>{{ $ajustes->name }} </h5>
        <p class="text-muted mb-1">{{ $ajustes->expertise }}</p>
        <p class="text-muted mb-4">Vitoria</p>
        <div class="d-flex justify-content-center">
          <div class="card text-left w-50">
            <div class="card-body">
              <h5 class="card-title">Detalles de Contacto</h5>
              <hr>
              <p class="card-text">
                <strong>Nombre Completo:</strong> {{ $ajustes->name }} {{ $ajustes->surname }}<br>
                <strong>Email:</strong> {{ $ajustes->email }}<br>
                <strong>Telefono:</strong> {{ $ajustes->telefone }}<br>
                <strong>empresa:</strong>{{ $extra->name }}<br>
                <strong>Direccion:</strong> {{ $extra->direction}}
              </p>
            </div>
          </div>
        </div>
      @endif
  </div>
</section>



  

@endsection