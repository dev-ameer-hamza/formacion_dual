@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")

<div class="container mt-5">
  <h1 class="text-center mb-5">Datos Del Tutor De Empresa</h1>
  <form class="mx-auto w-50" action="{{ route('cordinador.store.tutor.empresa',['tutor' => $tutor]) }}" method="post">
    @csrf
    <div class="form-group row">
      <div class="col-sm-6">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tutor->name }}">
      </div>
      <div class="col-sm-6">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$tutor->surname}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $tutor->email }}">
      </div>
      <div class="col-sm-6">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$tutor->telefone}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
  </form>   
</div>
@endsection