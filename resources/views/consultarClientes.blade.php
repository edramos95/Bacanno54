@extends('master')

@section('contenido')
<table class="table table-hover">
	<thead>
	<h2>LISTADO DE CLIENTES:</h2>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Fecha de nacimiento</th>
			<th>Sexo</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Estado civil</th>
			<th>Hijos</th>
			<th>
				<a href="{{url('/clientesPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($cliente as $c)
		<tr>
			<td>{{$c->id}}</td>
			<td>{{$c->nombre}}</td>
			<td>{{$c->fecha_nacimiento}}</td>
			<td>
				@if($c->sexo==0)
				<span class="label label-primary">Hombre</span>
				@elseif($c->sexo==1)
				<span class="label label-danger">Mujer</span>
				@elseif($c->sexo==2)
				<span class="label label-success">Indistinto</span>
				@endif
			</td>
			<td>{{$c->direccion}}</td>
			<td>{{$c->correo}}</td>
			<td>{{$c->telefono}}</td>
			<td>
				@if($c->estado_civil==0)
				<span class="label label-primary">Soltero(a)</span>
				@elseif($c->estado_civil==1)
				<span class="label label-danger">Casado(a)</span>
				@elseif($c->estado_civil==2)
				<span class="label label-success">Divorciado(a)</span>
				@elseif($c->estado_civil==3)
				<span class="label label-default">Viudo(a)</span>
				@endif
			</td>
			<td>
				@if($c->hijos==0)
				<span class="label label-success">No</span>
				@elseif($c->hijos==1)
				<span class="label label-warning">Si</span>
				@endif
			</td>
			<td>
				<a href="{{url('/editarCliente')}}/{{$c->id}}" class="btn btn-xs btn-primary">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/eliminarCliente')}}/{{$c->id}}" class="btn btn-xs btn-danger">
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