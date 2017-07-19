@extends('master')

@section('contenido')
<h2>EDITAR CLIENTES:</h2>
<form action="{{url('/actualizarCliente')}}/{{$cliente->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" required value="{{$cliente->nombre}}">
	</div>
	<div class="form-group">
		<label for="sexo">Sexo</label>
		<select name="sexo" class="form-control">
			@if($cliente->sexo==0)
			<option value="0" selected="">Hombre</option>
			@elseif($cliente->sexo==1)
			<option value="1" selected="">Mujer</option>
			@elseif($cliente->sexo==2)
			<option value="2" selected="">Indistinto</option>
			@endif

			<option value="0" selected="">Hombre</option>
			<option value="1">Mujer</option>
			<option value="2">Indistinto</option>
		</select>
	</div>
	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input type="text" class="form-control" name="direccion" required value="{{$cliente->direccion}}">
	</div>
	<div class="form-group">
		<label for="correo">Correo</label>
		<input type="text" class="form-control" name="correo" required value="{{$cliente->correo}}">
	</div>
	<div class="form-group">
		<label for="telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" required value="{{$cliente->telefono}}">
	</div>
	<div class="form-group">
		<label for="estado_civil">Estado Civil</label>
		<select name="estado_civil" class="form-control">
			@if($cliente->estado_civil==0)
			<option value="0" selected="">Soltero(a)</option>
			@elseif($cliente->estado_civil==1)
			<option value="1" selected="">Casado(a)</option>
			@elseif($cliente->estado_civil==2)
			<option value="2" selected="">Divorciado(a)</option>
			@elseif($cliente->estado_civil==3)
			<option value="3" selected="">Viudo(a)</option>
			@endif

			<option value="0" selected="">Soltero(a)</option>
			<option value="1">Casado(a)</option>
			<option value="2">Divorciado(a)</option>
			<option value="3">Viudo(a)</option>
		</select>
	</div>
	<div class="form-group">
		<label for="hijos">Hijos</label>
		<select name="hijos" class="form-control">
			@if($cliente->hijos==0)
			<option value="0" selected="">No</option>
			@elseif($cliente->hijos==1)
			<option value="1" selected="">Si</option>
			@endif

			<option value="0" selected="">No</option>
			<option value="1">Si</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/consultarClientes')}}" class="btn btn-danger">Cancelar</a>
</form>
@stop