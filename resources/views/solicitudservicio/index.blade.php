@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitud-Servicio</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Panel de Solicitud de Servicios</h2>
		</div>
	</div>


	@if(count($solicitud_servicios)>0)
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Solicitud</th>
					<th>Usuario</th>
					<th>Departamento</th>
					<th>Servicio</th>
					<th>Items</th>
					<th>Fecha de la Solicitud</th>
					<th>Status</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitud_servicios as $solicitud_servicio)
				<tr>
					<td>{{ $solicitud_servicio->uuid }}</td>
					<td>{{ $solicitud_servicio->user->name }}</td>
					<td>{{ $solicitud_servicio->departamento->nombre }}</td>
					<td>{{ $solicitud_servicio->servicio->nombre }}</td>
					<td>{{ count($solicitud_servicio->solicitud_servicio_items) }}</td>
					<td>{{ $solicitud_servicio->created_at->format('d-m-Y') }}</td>
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
						@if($solicitud_servicio->status=="A")
						<span class="badge badge-success">Aprobada</span>
						@endif
					</td>
					<td><a class="btn btn-primary" href="{{ route('solicitudservicio.show',$solicitud_servicio->id) }}">Ver</a></td>
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