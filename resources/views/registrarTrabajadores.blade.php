@extends('master')

@section('contenido')
<h2>REGISTRAR TRABAJADORES:</h2>
<form action="{{url('/guardarTrabajador')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>
	<div class="form-group">
		<label for="fecha_nacimiento">Fecha de nacimiento</label>
		<input type="date" class="form-control" name="fecha_nacimiento" required>
	</div>
	<div class="form-group">
		<label for="direccion">Direccion</label>
		<input type="text" class="form-control" name="direccion" required>
	</div>
	<div class="form-group">
		<label for="correo">Correo</label>
		<input type="text" class="form-control" name="correo" required>
	</div>
	<div class="form-group">
		<label for="telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" required>
	</div>
	<div class="form-group">
		<label for="estado">Estado</label>
		<select name="estado" class="form-control">
			<option value="0">Activo</option>
			<option value="1">Baja temporal</option>
			<option value="2">Despedido</option>
			<option value="3">Renuncia</option>
			<option value="4">Vacaciones</option>
		</select>
	</div>
	<div class="form-group">
		<label for="descripcion">Puesto</label>
		<select name="descripcion" class="form-control">
			@foreach($puesto as $p)
			<option value="{{$p->id}}">{{$p->descripcion}}</option>
			@endforeach
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</form>
<br>
@include('flash::message')
@stop