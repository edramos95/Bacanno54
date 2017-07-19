@extends('master')

@section('contenido')
<table class="table table-hover">
	<thead>
	<h2>HISTORIAL DE TRABAJADORES:</h2>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Fecha de nacimiento</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Puesto</th>
			<th>Estado</th>
			<th>
				<a href="{{url('/trabajadoresPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($trabajador as $t)
		<tr>
			<td>{{$t->id}}</td>
			<td>{{$t->nombre}}</td>
			<td>{{$t->fecha_nacimiento}}</td>
			<td>{{$t->direccion}}</td>
			<td>{{$t->correo}}</td>
			<td>{{$t->telefono}}</td>
			<td>{{$t->id_puesto}}</td>
			<td>
				@if($t->estado==0)
				<span class="label label-success">Activo</span>
				@elseif($t->estado==1)
				<span class="label label-warning">Baja temporal</span>
				@elseif($t->estado==2)
				<span class="label label-danger">Despedido</span>
				@elseif($t->estado==3)
				<span class="label label-default">Renuncia</span>
				@elseif($t->estado==4)
				<span class="label label-primary">Vacaciones</span>
				@endif
			</td>
			<td>
				<a href="{{url('/editarTrabajador')}}/{{$t->id}}" class="btn btn-xs btn-primary">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/eliminarTrabajador')}}/{{$t->id}}" class="btn btn-xs btn-danger">
				<span class="glyphicon glyphicon-remove" aria-hidden=true></span>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	@include('flash::message')
</table>
	<script type="text/javascript">
		setTimeout(function(){
			$(".alert").fadeOut(1500);
		}, 1500);
	</script>
@stop