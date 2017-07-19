<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Clientes</title>
</head>
<body>
	<h1>Listado de Clientes</h1>
	<hr>
	@foreach($cliente as $c)
	<table>
		<tr>
			<td><h3>Nombre</h3></td>
			<td><h3>Fecha de Nacimiento</h3></td>
			<td><h3>Telefono</h3></td>
			<td><h3>Correo</h3></td>
			<td><h3>Direccion</h3></td>
			<td><h3>Estado Civil</h3></td>
			<td><h3>Hijos</h3></td>
		</tr>
		<tr>
			<td>{{$c->nombre}}</td>
			<td>{{$c->fecha_nacimiento}}</td>
			<td>{{$c->telefono}}</td>
			<td>{{$c->correo}}</td>
			<td>{{$c->direccion}}</td>
			<td>
			@if($c->estado_civil==0)
			<label for="">Soltero(a)</label>
			@elseif($c->estado_civil==1)
			<label for="">Casado(a)</label>
			@elseif($c->estado_civil==2)
			<label for="">Divorciado(a)</label>
			@elseif($c->estado_civil==3)
			<label for="">Viudo(a)</label>
			@endif
			</td>
			<td>
			@if($c->hijos==0)
			<label for="">No</label>
			@endif
			</td>
		</tr>
	</table>
	@endforeach
</body>
</html>