@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")

<div class="container mt-5">
  <h1 class="text-center mb-5">Datos del Profesorado</h1>
  <div class="text-center mb-5">
    @foreach($activeRols as $activeRol)
      <span class="badge {{ $loop->first ? "badge-primary" : "badge-success"  }}">{{ $activeRol->name }}</span>
    @endforeach
  </div>
  <form class="mx-auto w-50" action="{{ route('cordinador.store.profesorado',['profesorado' => $profesorado]) }}" method="post">
    @csrf
    <div class="form-group row">
      <div class="col-sm-6">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$profesorado->name}}">
      </div>
      <div class="col-sm-6">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$profesorado->surname}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="dni">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" value="{{$profesorado->dni}}">
      </div>
      <div class="col-sm-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$profesorado->email}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$profesorado->tel}}">
      </div>
      @if($profesorado->isCoordinador())
      <div class="col-sm-6">
        <label for="grado">Grado</label>
        <select name="grado" class="form-control" id="grado">
          @foreach($grados as $grado)
            <option value="{{$grado->id}}" @if($grado->id == $activeGrado->id) selected @endif>{{$grado->name}}</option>
            @endforeach
        </select>
      </div>
        @endif
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="dni">Rol</label>
        <select name="rols[]" class="form-control" id="rol" multiple>
          @foreach($rols as $rol)
            <option value="{{ $rol->id }}" @if($rol->id == $activeRol->id) selected @endif>{{ $rol->name }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
  </form>   
</div>
@endsection