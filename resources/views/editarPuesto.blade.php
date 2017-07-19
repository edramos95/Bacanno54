@extends('master')

@section('contenido')
<h2>EDITAR PUESTOS:</h2>
<form action="{{url('/actualizarPuesto')}}/{{$puesto->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$puesto->descripcion}}">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarPuestos')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop