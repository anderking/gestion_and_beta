@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Home</li>
	</ol>
	
	@include('layouts.filtrarfechas')

	@if(count($solicitud)>0)
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nombre del Solicitante</th>
					<th>Cedula del Solicitante</th>
					<th>Carrera</th>
					<th>Documentos Solicitados</th>
					<th>Monto</th>
					<th>Fecha Solicitada</th>
					<th>Ultima Actualización</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitud as $solicitud)
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
					<td>{{ $solicitud->carrera->nombre }}</td>
					<td>
						@foreach($solicitud->solicitudes_documentos as $solicitud_documento)
						{{ $solicitud_documento->documento->nombre }} <b>{{ $solicitud_documento->precio_fact }}</b> Bs.S<br>
						@endforeach
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