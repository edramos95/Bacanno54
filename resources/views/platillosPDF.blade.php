<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Platillos</title>
</head>
<body>
	<h1>Listado de Platillos</h1>
	<hr>
	@foreach($platillo as $p)
	<table width="500px">
		<tr>
			<td><h3>Platillo</h3></td>
			<td><h3>Precio</h3></td>
		</tr>
		<tr>
			<td>{{$p->nombre}}</td>
			<td>${{$p->precio}}</td>
		</tr>
	</table>
	@endforeach
</body>
</html>