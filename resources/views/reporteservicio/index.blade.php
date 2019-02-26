@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Home</li>
	</ol>
	
	@include('layouts.filtrarfechas')

	@if(count($solicitud_servicios)>0)
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nombre del Solicitante</th>
					<th>Cedula del Solicitante</th>
					<th>Departamento</th>
					<th>Servicio</th>
					<th>Tipo de Servicio</th>
					<th>Observaciones</th>
					<th>Items Solicitados</th>
					<th>Fecha Solicitada</th>
					<th>Ultima Actualización</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitud_servicios as $solicitud_servicio)
				<tr>
					<td>{{ $solicitud_servicio->uuid }}</td>
					<td>{{ $solicitud_servicio->user->name }}</td>
					<td>{{ $solicitud_servicio->user->cedula }}</td>
					<td>{{ $solicitud_servicio->departamento->nombre }}</td>
					<td>{{ $solicitud_servicio->servicio->nombre }}</td>
					<td>{{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</td>
					<td>{{ $solicitud_servicio->observaciones }}</td>
					<td>{{ count($solicitud_servicio->solicitud_servicio_items) }}</td>
					<td>{{ $solicitud_servicio->created_at->format('Y-m-d') }}</td>
					<td>{{ $solicitud_servicio->updated_at->format('Y-m-d') }}</td>
					<td>
						@if($solicitud_servicio->status=="P")
						<span class="badge">Pendiente</span>
						@endif
						@if($solicitud_servicio->status=="C")
						<span class="badge badge-danger">Cancelada</span>
						@endif
						@if($solicitud_servicio->status=="R")
						<span class="badge badge-info">En Revisión</span>
						@endif
						@if($solicitud_servicio->status=="E")
						<span class="badge badge-warning">En Proceso</span>
						@endif
						@if($solicitud_servicio->status=="A")
						<span class="badge badge-success">Culminado</span>
						@endif
					</td>
					
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