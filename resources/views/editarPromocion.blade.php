@extends('master')

@section('contenido')
<h2>EDITAR PROMOCIONES:</h2>
<form action="{{url('/actualizarPromocion')}}/{{$promocion->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$promocion->descripcion}}">
	</div>
	<div class="form-group">
		<label for="fecha_inicio">Fecha de Inicio</label>
		<input type="date" class="form-control" name="fecha_inicio" required value="{{$promocion->fecha_inicio}}">
	</div>
	<div class="form-group">
		<label for="fecha_fin">Fecha de Finalizacion</label>
		<input type="date" class="form-control" name="fecha_fin" required value="{{$promocion->fecha_fin}}">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarPromociones')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop