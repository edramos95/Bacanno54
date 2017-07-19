<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Bebidas</title>
</head>
<body>
	<h1>Listado de Bebidas</h1>
	<hr>
	@foreach($bebida as $b)
	<table width="500px">
		<tr>
			<td><h3>Bebida</h3></td>
			<td><h3>Precio</h3></td>
		</tr>
		<tr>
			<td>{{$b->nombre}}</td>
			<td>${{$b->precio}}</td>
		</tr>
	</table>
	@endforeach
</body>
</html>