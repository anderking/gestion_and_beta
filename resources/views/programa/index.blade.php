@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitu de Programas <span class="badge">{{ count($solicitud_programas) }}</span></li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Panel de Solicitud de Programas</h2>
		</div>
	</div>

	@include('common.success')

	@include('layouts.filtrarfechas')

	@if(count($solicitud_programas)>0)	
		@foreach($solicitud_programas as $solicitud_programa)
		<ul class="list-group">
			<li class="list-group-item"><b>Solicitud: </b> {{ $solicitud_programa->uuid }}</li>
			<li class="list-group-item"><b>Nombre del Solicitante: </b> {{ $solicitud_programa->user->name }}</li>
			<li class="list-group-item"><b>Cedula del Solicitante: </b> {{ $solicitud_programa->user->cedula }}</li>
			<li class="list-group-item"><b>Teléfono del Solicitante: </b> {{ $solicitud_programa->user->phone }}</li>
			<li class="list-group-item"><b>Carrera: </b> {{ $solicitud_programa->pensum->nombre }}</li>
			<li class="list-group-item"><b>Pensum: </b> {{ $solicitud_programa->carrera->nombre }}</li>
			<li class="list-group-item"><b>Fecha de la Solicitud: </b> {{ $solicitud_programa->created_at->format('d-m-Y') }}</li>
			@if($solicitud_programa->status=='A')
				<li class="list-group-item"><b>Fecha de Aprobación: </b> {{ $solicitud_programa->updated_at->format('d-m-Y') }}</li>
			@endif
			<li class="list-group-item"><b>Status: </b>
				@if($solicitud_programa->status=="P")
				<span class="badge">Pendiente</span>
				@endif
				@if($solicitud_programa->status=="C")
				<span class="badge badge-danger">Cancelada</span>
				@endif
				@if($solicitud_programa->status=="R")
				<span class="badge badge-info">En Revisión</span>
				@endif
				@if($solicitud_programa->status=="E")
				<span class="badge badge-warning">En Proceso</span>
				@endif
				@if($solicitud_programa->status=="A")
				<span class="badge badge-success">Culminado</span>
				@endif
			</li>

			@if($solicitud_programa->status!='P' && $solicitud_programa->status!='C')
			<li class="list-group-item">
				<b>Comprobante: </b><a href="{{asset('img/')}}/{{$solicitud_programa->pago_img}}" target="_blank">{{ $solicitud_programa->pago_img }}</a>
			</li>
			@endif

			@if(Auth::user()->hasRole('estudiante') || Auth::user()->hasRole('admin'))
				@if($solicitud_programa->status=='P' || $solicitud_programa->status=='C')
				<li class="list-group-item">
					@if($solicitud_programa->status=='P')
					<a href="#modal-pago-solicitud_programa-{{ $solicitud_programa->id }}" data-toggle="modal" class="btn btn-primary">Pagar</a>
					<a href="#modal-cancelar-solicitud_programa-{{ $solicitud_programa->id }}" data-toggle="modal" class="btn btn-danger">Cancelar</a>
					@elseif($solicitud_programa->status=='C')
					<a href="#modal-activar-solicitud_programa-{{ $solicitud_programa->id }}" data-toggle="modal" class="btn btn-warning">Activar</a>
					@endif
				</li>
				@endif
			@endif
			
			@if(Auth::user()->hasRole('directoradm'))
				@if($solicitud_programa->status=='R')
				<li class="list-group-item">
					<a href="#modal-procesar-solicitud_programa-{{ $solicitud_programa->id }}" data-toggle="modal" class="btn btn-primary">Aprobar</a>
				</li>
				@endif
			@endif

			@if(Auth::user()->hasRole('secretario') || Auth::user()->hasRole('directorpro'))
				@if($solicitud_programa->status=='E')
				<li class="list-group-item">
					<a href="#modal-aprobar-solicitud_programa-{{ $solicitud_programa->id }}" data-toggle="modal" class="btn btn-primary">Culminar</a>
				</li>
				@endif
			@endif

		</ul>
		@include('programa.modal-pago')
		@include('programa.modal-cancelar')
		@include('programa.modal-activar')
		@include('programa.modal-procesar')
		@include('programa.modal-aprobar')
		@endforeach
	@else
		<div class="jumbotron">
			<h2 class="text-center">No hay solicitudes pendientes</h2>
		</div>
	@endif

</div>



@endsection