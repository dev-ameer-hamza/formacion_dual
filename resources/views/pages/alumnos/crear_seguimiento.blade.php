@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section("content")



<div class="container mt-5">
    <h2 class="text-center mb-5">Diario de Aprendizaje</h2>
    <form class="mx-auto" style="max-width: 500px;" action="{{route('student.store.seguimiento')}}" method="post">
    @csrf
      <div class="form-group">
      <label for="fechaini">@lang("common.periodo")</label>
      <input type="date" class="form-control" name="periodo" id="periodo" value="{{ old('periodo') }}" >
      </div>
      <div class="form-group ">
      <label for="fechaini">@lang("common.actividadesDesarroladas") </label>
      <textarea class="form-control" name="actividades_desarrolladas" id="actividades_desarrolladas" value="{{ old('actividades_desarrolladas') }}" rows="3"></textarea>
    </div>
    <div class="form-group ">
      <label for="fechaini">@lang("common.reflexionAprendizaje") </label>
      <textarea class="form-control" name="reflexion" id="reflexion"value="{{ old('reflexion') }}" rows="3"></textarea>
    </div>
  <div class="form-group">
    <label for="inputAddress">@lang("common.identificacionProblemasDificultadesMejoras")</label>
    <textarea class="form-control" name="problemas" id="problemas"value="{{ old('problemas') }}" rows="3"></textarea>
  </div>
      <button type="submit" class="btn btn-primary btn-block mt-3">@lang("common.añadir")</button>
    </form>

    <script type="text/javascript">

 window.wpforms_datepicker = {
     mode: "range"
 }

</script>

@endsection
