@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitu de Servicios <span class="badge">{{ count($solicitud_servicios) }}</span></li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Panel de Solicitud de Servicios</h2>
		</div>
	</div>

	@include('common.success')

	@include('layouts.filtrarfechas')

	@if(count($solicitud_servicios)>0)	
		@foreach($solicitud_servicios as $solicitud_servicio)
		<ul class="list-group">
			<li class="list-group-item"><b>Solicitud: </b> {{ $solicitud_servicio->uuid }}</li>
			<li class="list-group-item"><b>Nombre del Solicitante: </b> {{ $solicitud_servicio->user->name }}</li>
			<li class="list-group-item"><b>Cedula del Solicitante: </b> {{ $solicitud_servicio->user->cedula }}</li>
			<li class="list-group-item"><b>Departamento: </b> {{ $solicitud_servicio->departamento->nombre }}</li>
			{{-- <li class="list-group-item"><b>Tipo de Servicio: </b> {{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</li> --}}
			<li class="list-group-item"><b>Servicio: </b> {{ $solicitud_servicio->servicio->nombre }}</li>
			<li class="list-group-item"><b>Observaciones: </b> {{ $solicitud_servicio->observaciones }}</li>
			<li class="list-group-item"><b>Items: </b><br>
				@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
				@if($solicitud_servicio_item->cantidad)
				<b>({{ $solicitud_servicio_item->cantidad }} unidades)</b>
				@endif
				{{ $solicitud_servicio_item->item->nombre }}<br>
				@endforeach
			</li>
			<li class="list-group-item"><b>Fecha de la Solicitud: </b> {{ $solicitud_servicio->created_at->format('d-m-Y') }}</li>
			@if($solicitud_servicio->status=='A')
				<li class="list-group-item"><b>Fecha de Aprobación: </b> {{ $solicitud_servicio->updated_at->format('d-m-Y') }}</li>
			@endif
			<li class="list-group-item"><b>Status: </b>
				@if($solicitud_servicio->status=="P")
				<span class="badge">Pendiente</span>
				@endif
				@if($solicitud_servicio->status=="C")
				<span class="badge badge-success">Cancelado</span>
				@endif
				@if($solicitud_servicio->status=="E")
				<span class="badge badge-warning">En Proceso</span>
				@endif
				@if($solicitud_servicio->status=="A")
				<span class="badge badge-success">Culminado</span>
				@endif
			</li>

			@if(Auth::user()->hasRole('docente') || Auth::user()->hasRole('admin'))
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
			
			@if(Auth::user()->hasRole('directoradm'))
				@if($solicitud_servicio->status=='P')
				<li class="list-group-item">
					<a href="#modal-procesar-solicitud_servicio-{{ $solicitud_servicio->id }}" data-toggle="modal" class="btn btn-primary">Aprobar</a>
				</li>
				@endif
			@endif

			@if(Auth::user()->hasRole('encargadoserv'))
				@if($solicitud_servicio->status=='E')
				<li class="list-group-item">
					<a href="#modal-aprobar-solicitud_servicio-{{ $solicitud_servicio->id }}" data-toggle="modal" class="btn btn-primary">Culminar</a>
				</li>
				@endif
			@endif

		</ul>
		@include('solicitudservicio.modal-cancelar')
		@include('solicitudservicio.modal-activar')
		@include('solicitudservicio.modal-procesar')
		@include('solicitudservicio.modal-aprobar')
		@endforeach
	@else
		<div class="jumbotron">
			<h2 class="text-center">No hay solicitudes pendientes</h2>
		</div>
	@endif

</div>



@endsection