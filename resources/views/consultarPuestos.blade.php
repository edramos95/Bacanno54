@extends('master')

@section('contenido')
<table class="table table-hover">
	<thead>
	<h2>PUESTOS DISPONIBLES:</h2>
		<tr>
			<th>ID</th>
			<th>Descripción</th>
			<th>
				<a href="{{url('/puestosPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($puesto as $p)
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->descripcion}}</td>
			<td>
				<a href="{{url('/editarPuesto')}}/{{$p->id}}" class="btn btn-xs btn-primary">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/eliminarPuesto')}}/{{$p->id}}" class="btn btn-xs btn-danger">
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