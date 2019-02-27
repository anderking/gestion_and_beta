<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
	body{
		background: none;
	}
</style>
<body>
	<ul class="list-group">
		<li class="list-group-item"><b>Solicitud: </b> {{ $solicitud->uuid }}</li>
		<li class="list-group-item"><b>Nombre del Solicitante: </b> {{ $solicitud->user->name }}</li>
		<li class="list-group-item"><b>Cedula del Solicitante: </b> {{ $solicitud->user->cedula }}</li>
		<li class="list-group-item"><b>Carrera: </b> {{ $solicitud->carrera->nombre }}</li>
		<li class="list-group-item"><b>Documentos: </b><br>
			@php
			 	$total=0;
			 @endphp
			@foreach($documentos as $documento)
			
			@php
    			$total = $total+$documento->precio_fact;
			@endphp

			<b>{{ $documento->precio_fact }}</b> Bs.S {{ $documento->documento->nombre }}<br>
			@endforeach
		</li>
		<li class="list-group-item"><b>Total: </b> {{ $total }} Bs.S</li>
		<li class="list-group-item"><b>Fecha de la Solicitud: </b> {{ $solicitud->created_at->format('d-m-Y') }}</li>
	</ul>
</body>
</html>