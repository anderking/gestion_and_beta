@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Precio-Documentos</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Precio de Documentos</h1>
		</div>
	</div>

@if(count($precio_documentos)>0)
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Carrera</th>
				<th>Pensum</th>
				<th>Precio</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($precio_documentos as $precio_documento)
			<tr>
				<td>{{ $precio_documento->carrera->nombre }}</td>
				<td>{{ $precio_documento->documento->nombre }}</td>
				<td>{{ $precio_documento->precio }}</td>
				<td>
					<a class="btn btn-primary" href="{{ route('precioDocumentos.edit',$precio_documento->id) }}">Editar</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de precios en nuestra Base de Datos</h1>
	</div>
@endif

</div>
@endsection