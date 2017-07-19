@extends('master')

@section('contenido')
<table class="table table-hover">
	<thead>
	<h2>PROMOCIONESS DISPONIBLES:</h2>
		<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Fecha de Inicio</th>
			<th>Fecha de Finalización</th>
			<th>
				<a href="{{url('/promocionesPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($promocion as $p)
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->descripcion}}</td>
			<td>{{$p->fecha_inicio}}</td>
			<td>{{$p->fecha_fin}}</td>
			<td>
				<a href="{{url('/editarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-primary">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/eliminarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-danger">
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