@extends('master')

@section('contenido')
<h2>REGISTRAR BEBIDAS:</h2>
<form action="{{url('/guardarBebida')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<input type="text" class="form-control" name="descripcion" required>
	</div>
	<div class="form-group">
		<label for="precio">Precio</label>
		<input type="number" class="form-control" name="precio" required>
	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</form>
<br>
@include('flash::message')
@stop