@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitu de Documentos <span class="badge">{{ count($solicitudes) }}</span></li>
	</ol>
	
	@include('layouts.filtrarfechas')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			{!! Form::open(array('route' => 'reportedocumentospdf','method' => 'GET')) !!}
			<input type="hidden" id="desdepdf" name="desdepdf" value="{{ $request->desde }}">
			<input type="hidden" id="hastapdf" name="hastapdf" value="{{ $request->hasta }}">
			<input type="hidden" id="statuspdf" name="statuspdf" value="{{ $request->status }}">
			<input type="hidden" id="cedulapdf" name="cedulapdf" value="{{ $request->cedula }}">
			<input type="submit" value="Generar PDF" class="btn btn-danger">
			{!! Form::close() !!}
			<br class="visible-xs">
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			{!! Form::open(array('route' => 'reportedocumentosexcel','method' => 'GET')) !!}
			<input type="hidden" id="desdeexcel" name="desdeexcel" value="{{ $request->desde }}">
			<input type="hidden" id="hastaexcel" name="hastaexcel" value="{{ $request->hasta }}">
			<input type="hidden" id="statusexcel" name="statusexcel" value="{{ $request->status }}">
			<input type="hidden" id="cedulaexcel" name="cedulaexcel" value="{{ $request->cedula }}">
			<input type="submit" value="Generar EXCEL" class="btn btn-success">
			{!! Form::close() !!}
		</div>
	</div>
	<br>

	@if(count($solicitudes)>0)
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nombre del Solicitante</th>
					<th>Cedula del Solicitante</th>
					<th>Teléfono del Solicitante</th>
					<th>Correo Enviado</th>
					<th>Carrera</th>
					<th>Documentos Solicitados</th>
					<th>Monto</th>
					<th>Fecha Solicitada</th>
					<th>Ultima Actualización</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitudes as $solicitud)
					@php
					 	$total=0;
					 @endphp
					@foreach($solicitud->solicitudes_documentos as $solicitud_documento)
					@php
		    			$total = $total+$solicitud_documento->precio_fact;
					@endphp
					@endforeach
				<tr>
					<td>{{ $solicitud->uuid }}</td>
					<td>{{ $solicitud->user->name }}</td>
					<td>{{ $solicitud->user->cedula }}</td>
					<td>{{ $solicitud->user->phone }}</td>
					<td>{{ $solicitud->email }}</td>
					<td>{{ $solicitud->carrera->nombre }}</td>
					<td>
						<ul>
							@foreach($solicitud->solicitudes_documentos as $solicitud_documento)
							<li>
								{{ $solicitud_documento->documento->nombre }} ({{ $solicitud_documento->precio_fact }} Bs.S)
								</li>
							@endforeach
						</ul>
					</td>
					<td>{{ $total }} Bs.S</td>
					<td>{{ $solicitud->created_at->format('Y-m-d') }}</td>
					<td>{{ $solicitud->updated_at->format('Y-m-d') }}</td>
					<td>
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