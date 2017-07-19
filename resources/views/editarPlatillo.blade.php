@extends('master')

@section('contenido')
<h2>EDITAR PLATILLOS:</h2>
<form action="{{url('/actualizarPlatillo')}}/{{$platillo->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required value="{{$platillo->nombre}}">
	</div>
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$platillo->descripcion}}">
	</div>
	<div class="form-group">
		<label for="precio">Precio</label>
		<input type="number" class="form-control" name="precio" required value="{{$platillo->precio}}">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarPlatillos')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop