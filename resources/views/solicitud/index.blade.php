@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitu de Documentos <span class="badge">{{ count($solicitudes) }}</span></li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Panel de Solicitud de Documentos</h2>
		</div>
	</div>

	@include('common.success')
	@include('common.errors')


	@include('layouts.filtrarfechas')

	@if(count($solicitudes)>0)	
		@foreach($solicitudes as $solicitud)
		<ul class="list-group">
			<li class="list-group-item"><b>Solicitud: </b> {{ $solicitud->uuid }}</li>
			<li class="list-group-item"><b>Nombre del Solicitante: </b> {{ $solicitud->user->name }}</li>
			<li class="list-group-item"><b>Cedula del Solicitante: </b> {{ $solicitud->user->cedula }}</li>
			<li class="list-group-item"><b>Carrera: </b> {{ $solicitud->carrera->nombre }}</li>
			<li class="list-group-item"><b>Documentos: </b><br>
				@php
				 	$total=0;
				 @endphp
				@foreach($solicitud->solicitudes_documentos as $solicitud_documento)
				
				@php
	    			$total = $total+$solicitud_documento->precio_fact;
				@endphp

				<b>{{ $solicitud_documento->precio_fact }}</b> Bs.S {{ $solicitud_documento->documento->nombre }}<br>
				@endforeach
			</li>
			<li class="list-group-item"><b>Total: </b> {{ $total }} Bs.S</li>
			<li class="list-group-item"><b>Fecha de la Solicitud: </b> {{ $solicitud->created_at->format('d-m-Y') }}</li>
			@if($solicitud->status=='A')
				<li class="list-group-item"><b>Fecha de Aprobación: </b> {{ $solicitud->updated_at->format('d-m-Y') }}</li>
			@endif
			<li class="list-group-item"><b>Status: </b>
				@if($solicitud->status=="P")
				<span class="badge">Pendiente</span>
				@endif
				@if($solicitud->status=="C")
				<span class="badge badge-danger">Cancelada</span>
				@endif
				@if($solicitud->status=="R")
				<span class="badge badge-info">En Revisión</span>
				@endif
				@if($solicitud->status=="E")
				<span class="badge badge-warning">En Proceso</span>
				@endif
				@if($solicitud->status=="A")
				<span class="badge badge-success">Culminado</span>
				@endif
			</li>

			@if($solicitud->status!='P' && $solicitud->status!='C')
			<li class="list-group-item">
				<b>Comprobante: </b><a href="{{asset('img/')}}/{{$solicitud->pago_img}}" target="_blank">{{ $solicitud->pago_img }}</a>
			</li>
			@endif

			@if(Auth::user()->hasRole('estudiante') || Auth::user()->hasRole('admin'))
				@if($solicitud->status=='P' || $solicitud->status=='C')
				<li class="list-group-item">
					@if($solicitud->status=='P')
					<a href="#modal-pago-solicitud-{{ $solicitud->id }}" data-toggle="modal" class="btn btn-primary">Pagar</a>
					<a href="#modal-cancelar-solicitud-{{ $solicitud->id }}" data-toggle="modal" class="btn btn-danger">Cancelar</a>
					@elseif($solicitud->status=='C')
					<a href="#modal-activar-solicitud-{{ $solicitud->id }}" data-toggle="modal" class="btn btn-warning">Activar</a>
					@endif
				</li>
				@endif
			@endif
			
			@if(Auth::user()->hasRole('directoradm'))
				@if($solicitud->status=='R')
				<li class="list-group-item">
					<a href="#modal-procesar-solicitud-{{ $solicitud->id }}" data-toggle="modal" class="btn btn-primary">Aprobar</a>
				</li>
				@endif
			@endif

			@if(Auth::user()->hasRole('secretario'))
				@if($solicitud->status=='E')
				<li class="list-group-item">
					<a href="#modal-aprobar-solicitud-{{ $solicitud->id }}" data-toggle="modal" class="btn btn-primary">Culminar</a>
				</li>
				@endif
			@endif

		</ul>
		@include('solicitud.modal-pago')
		@include('solicitud.modal-cancelar')
		@include('solicitud.modal-activar')
		@include('solicitud.modal-procesar')
		@include('solicitud.modal-aprobar')
		@endforeach
	@else
		<div class="jumbotron">
			<h2 class="text-center">No hay solicitudes pendientes</h2>
		</div>
	@endif

</div>



@endsection