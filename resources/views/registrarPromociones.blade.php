@extends('master')

@section('contenido')
<h2>REGISTRAR PROMOCIONES:</h2>
<form action="{{url('/guardarPromocion')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<input type="text" class="form-control" name="descripcion" required>
	</div>
	<div class="form-group">
		<label for="fecha_inicio">Fecha de Inicio</label>
		<input type="date" class="form-control" name="fecha_inicio" required>
	</div>
	<div class="form-group">
		<label for="fecha_fin">Fecha de finalizacion</label>
		<input type="date" class="form-control" name="fecha_fin" required>
	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</form>
<br>
@include('flash::message')
@stop