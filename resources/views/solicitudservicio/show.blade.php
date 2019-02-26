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

	@if($solicitud_servicio)
		<ul class="list-group">
			<li class="list-group-item"><b>Solicitud: </b> {{ $solicitud_servicio->uuid }}</li>
			<li class="list-group-item"><b>Usuario: </b> {{ $solicitud_servicio->user->name }}</li>
			<li class="list-group-item"><b>Departamento: </b> {{ $solicitud_servicio->departamento->nombre }}</li>
			<li class="list-group-item"><b>Servicio: </b> {{ $solicitud_servicio->servicio->nombre }}</li>
			<li class="list-group-item"><b>Items: </b><br>
				@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
				<b>{{ $solicitud_servicio_item->item->nombre }}</b><br>
				@endforeach
			</li>
			<li class="list-group-item"><b>Fecha de la Solicitud: </b> {{ $solicitud_servicio->created_at->format('d-m-Y') }}</li>
			<li class="list-group-item"><b>Status: </b>
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
			</li>
			
			@if(Auth::user()->hasRole('docente'))
				@if($solicitud_servicio->status=='P' || $solicitud_servicio->status=='C')
				<li class="list-group-item">
					@if($solicitud_servicio->status=='P')
					<a href="#modal-cancelar-solicitud_servicio-{{ $solicitud_servicio->id }}" data-toggle="modal" class="btn btn-danger">Cancelar</a>
					@elseif($solicitud_servicio->status=='C')
					<a href="#modal-activar-solicitud_servicio-{{ $solicitud_servicio->id }}" data-toggle="modal" class="btn btn-warning">Activar</a>
					@endif
				</li>
				@endif
			@endif

		</ul>
		<a class="btn btn-primary" href="{{ route('solicitudservicio.index') }}">Regresar</a>

		@include('solicitudservicio.modal-cancelar')
		@include('solicitudservicio.modal-activar')
	@else
		<div class="jumbotron">
			<h2 class="text-center">No hay solicitudes pendientes</h2>
		</div>
	@endif


</div>



@endsection