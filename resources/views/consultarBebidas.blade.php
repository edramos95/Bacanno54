@extends('master')

@section('contenido')
<table class="table table-hover">
	<thead>
	<h2>BEBIDAS DISPONIBLES:</h2>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>
				<a href="{{url('/bebidasPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($bebida as $b)
		<tr>
			<td>{{$b->id}}</td>
			<td>{{$b->nombre}}</td>
			<td>{{$b->descripcion}}</td>
			<td>${{$b->precio}}</td>
			<td>
				<a href="{{url('/editarBebida')}}/{{$b->id}}" class="btn btn-xs btn-primary">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/eliminarBebida')}}/{{$b->id}}" class="btn btn-xs btn-danger">
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