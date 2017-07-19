@extends('master')

@section('contenido')
<h2>EDITAR TRABAJADORES:</h2>
<form action="{{url('/actualizarTrabajador')}}/{{$trabajador->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required value="{{$trabajador->nombre}}">
	</div>
	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input type="text" class="form-control" name="direccion" required value="{{$trabajador->direccion}}">
	</div>
	<div class="form-group">
		<label for="correo">Correo</label>
		<input type="text" class="form-control" name="correo" required value="{{$trabajador->correo}}">
	</div>
	<div class="form-group">
		<label for="telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" required value="{{$trabajador->telefono}}">
	</div>
	<div class="form-group">
		<label for="descripcion">Puesto</label>
		<select name="descripcion" class="form-control">
			@if($trabajador->id_puesto==2)
			<option value="2" selected="">Barrero</option>
			@elseif($trabajador->id_puesto==3)
			<option value="3" selected="">Cocinero</option>
			@elseif($trabajador->id_puesto==3)
			<option value="4" selected="">Gerente</option>
			@endif

			<option value="2" selected="">Barrero</option>
			<option value="3">Cocinero</option>
			<option value="4">Gerente</option>
		</select>
	</div>
	<div class="form-group">
		<label for="estado">Estado</label>
		<select name="estado" class="form-control">
			@if($trabajador->estado==0)
			<option value="0" selected="">Activo</option>
			@elseif($trabajador->estado==1)
			<option value="1" selected="">Baja temporal</option>
			@elseif($trabajador->estado==2)
			<option value="2" selected="">Despedido</option>
			@elseif($trabajador->estado==3)
			<option value="3" selected="">Renuncia</option>
			@elseif($trabajador->estado==0)
			<option value="4" selected="">Vacaciones</option>
			@endif

			<option value="0" selected="">Activo</option>
			<option value="1">Baja temporal</option>
			<option value="2">Despedido</option>
			<option value="3">Renuncia</option>
			<option value="4">Vacaciones</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarTrabajadores')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop