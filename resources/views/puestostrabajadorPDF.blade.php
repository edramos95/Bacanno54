<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Puesto {{$puesto->descripcion}}</title>
</head>
<body>
	<h1>Listado de trabajadores de {{$puesto->descripcion}}</h1>
	<div>
		<table class="table table-striped" cellpadding="30" cellspacing="5">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Telefono</td>
				</tr>
			</thead>
			<tbody>
				@foreach($puestosAsignados as $pa)
					<tr>
						<td>{{$pa->id}}</td>
						<td>{{$pa->nombre}}</td>
						<td>{{$pa->correo}}</td>
						<td>{{$pa->telefono}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>