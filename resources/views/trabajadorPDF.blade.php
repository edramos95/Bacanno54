<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Trabajadores</title>
</head>
<body>
	<h1>Listado de Trabajadores</h1>
	<hr>
	@foreach($trabajador as $t)
	<table width="700px">

		<tr>
			<td><h3>Nombre</h3></td>
			<td><h3>Direccion</h3></td>
			<td><h3>Correo</h3></td>
			<td><h3>Telefono</h3></td>
			<td><h3>Estado</h3></td>
		</tr>
		<tr>
			<td>{{$t->nombre}}</td>
			<td>{{$t->direccion}}</td>
			<td>{{$t->correo}}</td>
			<td>{{$t->telefono}}</td>
			<td>
				@if($t->estado==0)
				<label for="">Activo(a)</label>
				@elseif($t->estado==1)
				<label for="">Baja temporal</label>
				@elseif($t->estado==2)
				<label for="">Despedido(a)</label>
				@elseif($t->estado==3)
				<label for="">Renuncia</label>
				@elseif($t->estado==4)
				<label for="">Vacaciones</label>
				@endif
			</td>
		</tr>
	</table>
	@endforeach
</body>
</html>