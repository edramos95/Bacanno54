@extends('master')

@section('contenido')
<h2>REGISTRAR CLIENTE:</h2>
<form action="{{url('/guardarCliente')}}" method="POST">
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
		<label for="sexo">Sexo</label>
		<select name="sexo" class="form-control">
			<option value="0">Hombre</option>
			<option value="1">Mujer</option>
			<option value="2">Indistinto</option>
		</select>
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
		<label for="estado_civil">Estado civil</label>
		<select name="estado_civil" class="form-control">
			<option value="0">Soltero(a)</option>
			<option value="1">Casado(a)</option>
			<option value="2">Divorciado(a)</option>
			<option value="3">Viudo(a)</option>
		</select>
	</div>
	<div class="form-group">
		<label for="hijos">Hijos</label>
		<select name="hijos" class="form-control">
			<option value="0">No</option>
			<option value="1">Si</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</form>
<br>
@include('flash::message')
@stop