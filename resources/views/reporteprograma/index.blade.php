@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Solicitu de Programas <span class="badge">{{ count($solicitud_programas) }}</span></li>
	</ol>
	
	@include('layouts.filtrarfechas')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			{!! Form::open(array('route' => 'reporteprogramaspdf','method' => 'GET')) !!}
			<input type="hidden" id="desdepdf" name="desdepdf" value="{{ $request->desde }}">
			<input type="hidden" id="hastapdf" name="hastapdf" value="{{ $request->hasta }}">
			<input type="hidden" id="statuspdf" name="statuspdf" value="{{ $request->status }}">
			<input type="hidden" id="cedulapdf" name="cedulapdf" value="{{ $request->cedula }}">
			<input type="submit" value="Generar PDF" class="btn btn-danger">
			{!! Form::close() !!}
		<br class="visible-xs">
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			{!! Form::open(array('route' => 'reporteprogramasexcel','method' => 'GET')) !!}
			<input type="hidden" id="desdeexcel" name="desdeexcel" value="{{ $request->desde }}">
			<input type="hidden" id="hastaexcel" name="hastaexcel" value="{{ $request->hasta }}">
			<input type="hidden" id="statusexcel" name="statusexcel" value="{{ $request->status }}">
			<input type="hidden" id="cedulaexcel" name="cedulaexcel" value="{{ $request->cedula }}">
			<input type="submit" value="Generar EXCEL" class="btn btn-success">
			{!! Form::close() !!}
		</div>
	</div>
	<br>

	@if(count($solicitud_programas)>0)
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
					<th>Pensum</th>
					<th>Descripción</th>
					<th>Monto</th>
					<th>Fecha Solicitada</th>
					<th>Ultima Actualización</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitud_programas as $solicitud_programa)
				<tr>
					<td>{{ $solicitud_programa->uuid }}</td>
					<td>{{ $solicitud_programa->user->name }}</td>
					<td>{{ $solicitud_programa->user->cedula }}</td>
					<td>{{ $solicitud_programa->user->phone }}</td>
					<td>{{ $solicitud_programa->email }}</td>
					<td>{{ $solicitud_programa->carrera->nombre }}</td>
					<td>{{ $solicitud_programa->pensum->nombre }}</td>
					<td>{{ $solicitud_programa->descripcion }}</td>
					<td>{{ $solicitud_programa->precio_fact }} Bs.S</td>
					<td>{{ $solicitud_programa->created_at->format('Y-m-d') }}</td>
					<td>{{ $solicitud_programa->updated_at->format('Y-m-d') }}</td>
					<td>
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