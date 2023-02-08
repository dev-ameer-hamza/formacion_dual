@extends('layouts.app')

@section("content")



<div >
    <!--Table-->
    <div class="row">
      <div class="d-flex justify-content-between"> 
        <h2 class="mb-4">Historial academico</h2>
        <a href="{{route('student.historial')}}">
            <button class="btn btn-dark font-weight-light"> Volver </button>
        </a> 
      </div>
    </div>

      <div class="row">
        <p class="col-5">A&ntilde;o academico</p>
        <p class="col-5">2012-2013</p>
      </div>
      <div class="row">
        <p class="col-5">Empresa</p>
        <p class="col-5">Mercedes</p>
      </div>
      <div class="row">
        <p class="col-5">Curso</p>
        <p class="col-5">2</p>
      </div>
</div>
<div >
        <h4>Facilitador por parte del tutor de la universidad</h4>
        <div class="row">
            <p class="col-5">Nombre y apellidos</p>
            <p class="col-5">Alex Blanco</p>
        </div>
        <div class="row">
            <p class="col-5">Email:</p>
            <p class="col-5">alex.blanco@gmail.com</p>
        </div>
        <div class="row">
            <p class="col-5">Departamento</p>
            <p class="col-5">algo</p>
        </div>
</div>
<div >
        <h4>Facilitador por parte de la Empresa</h4>
        <div class="row">
            <p class="col-5">Nombre y apellidos</p>
            <p class="col-5">Jon Vadillo</p>
        </div>
        <div class="row">
            <p class="col-5">Email:</p>
            <p class="col-5">jon.vadillo@gmail.com</p>
        </div>
        <div class="row">
            <p class="col-5">facultad:</p>
            <p class="col-5">Ingenieria</p>
        </div>
</div>
<div >
        <h4>Nota</h4>
        <div class="row">
            <p class="col-5">Nota diario</p>
            <p class="col-5">9</p>
        </div>
        <div class="row">
            <p class="col-5">Nota empresa</p>
            <p class="col-5">7</p>
        </div>
        <div class="row">
            <p class="col-5">Nota Final</p>
            <p class="col-5">8</p>
        </div>
</div>
<h2>Entradas</h2>
    <table class="table table-striped text-center">
    
      <!--Table head-->
      <thead>
        <tr>
          <th>Periodo</th>
          <th>Actividades</th>
          <th>Reflexion</th>
          <th>Incidencias</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <!--Table body-->
      <tbody>
        @foreach($unhistorial as $historia )
                    <tr>
                    <form action="" method="get">
                    <td>{{ $historia->date }}</td>
                    <td>{{ $historia->activities}}</td>
                    <td>{{ $historia->reflection }}</td>
                    <td>{{ $historia->problems}}</td>
          <td>
         <!-- <button id="cambiar" class="btn btn-outline-warning">Editar</button>-->
          </form>
          </td>
          <td>
            <form action="{{ route('student.destroy.historial', $historia->id ) }}" method="post">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-outline-danger">Eliminar</button>
            </form>
          </td>    
          </tr> 
          @endforeach
      </tbody>
    </table>



@endsection
