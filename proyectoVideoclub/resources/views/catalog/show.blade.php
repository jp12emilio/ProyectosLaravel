@extends('layouts.master')

@section('content')
<div class="row">

	<div class="col-sm-4">
			<img src="{{$pelicula->poster}}" style="height:300px"/>
	</div>
	<div class="col-sm-8">
		<h1>
			{{$pelicula->title}}
		</h1>
		<h5>
			Año: {{$pelicula->year}}
		</h5>
		<h5>
			Director: {{$pelicula->director}}
		</h5>
		<br>
		<p>
			<strong>Resumen: </strong>{{$pelicula->synopsis}}
		</p>
		@if($pelicula->rented == false)
			<strong>Estado: </strong> Película disponible.<br><br>
			<a class="btn btn-primary" type="button">Alquilar película</a>
		@else
			<strong>Estado: </strong> Película actualmente alquilada.<br><br>
			<a class="btn btn-danger" type="button"">Devolver película</a>
		@endif
		<a class="btn btn-warning" type="button" href="{{url('/catalog/edit/' . $pelicula->id)}}">Editar película</a>
		<a class="btn btn-default" type="button" href="{{url('/catalog/')}}">Volver al listado</a>

	</div>
</div>

@stop