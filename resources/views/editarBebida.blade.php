@extends('master')

@section('contenido')
<h2>EDITAR BEBIDAS:</h2>
<form action="{{url('/actualizarBebida')}}/{{$bebida->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required value="{{$bebida->nombre}}">
	</div>
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$bebida->descripcion}}">
	</div>
	<div class="form-group">
		<label for="precio">Precio</label>
		<input type="number" class="form-control" name="precio" required value="{{$bebida->precio}}">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarBebidas')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop