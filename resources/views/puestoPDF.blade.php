<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Puestos</title>
</head>
<body>
	<h1>Listado de Puestos</h1>
	<hr>
	@foreach($puesto as $p)
	<table width="500px">
		<tr>
			<td><h3>ID</h3></td>
			<td><h3>Descripcion</h3></td>
		</tr>
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->descripcion}}</td>
		</tr>
	</table>
	@endforeach
</body>
</html>