<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Promociones</title>
</head>
<body>
	<h1>Listado de Promociones</h1>
	<hr>
	@foreach($promocion as $p)
	<table width="700px">
		<tr>
			<td><h3>Descripcion</h3></td>
			<td><h3>Fecha de Inicio</h3></td>
			<td><h3>Fecha de Finalización</h3></td>
		</tr>
		<tr>
			<td>{{$p->descripcion}}</td>
			<td>{{$p->fecha_inicio}}</td>
			<td>{{$p->fecha_fin}}</td>
		</tr>
	</table>
	@endforeach
</body>
</html>