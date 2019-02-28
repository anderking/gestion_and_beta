@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Sugerencias <span class="badge">{{ count($sugerencias) }}</span></li>
	</ol>
	
	@include('layouts.filtrarfechas')

	@if(count($sugerencias)>0)
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Nombre del usuario</th>
					<th>Cédula del usuario</th>
					<th>Descripción</th>
					<th>Fecha</th>			
				</tr>
			</thead>
			<tbody>
				@foreach($sugerencias as $sugerencia)
				<tr>
					<td>{{ $sugerencia->user->name }}</td>
					<td>{{ $sugerencia->user->cedula }}</td>
					<td>{{ $sugerencia->descripcion }}</td>
					<td>{{ $sugerencia->created_at->format('Y-m-d') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@else
		<div class="jumbotron">
			<h1 class="text-center">No hay registros</h1>
		</div>
	@endif
	
</div>
@endsection