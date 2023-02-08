@extends('layouts.app')

@section("content")

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item"><a href="#">Usuario</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajustes de Perfil</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="img/avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">Gorka Uriarte</h5>
            <p class="text-muted mb-1">Developer</p>
            <p class="text-muted mb-4">Vitoria</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre Completo</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Ameer Hamza</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">ameer.hamza@gmail.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Telefono</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">63476437</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Celular</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">94572372</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Direccion</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Vitoria</p>
              </div>
  </div>
</section>
@endsection