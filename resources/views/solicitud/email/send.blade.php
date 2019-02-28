<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
	.text-center{
		text-align: center;
	}
</style>
<body>
	@if($solicitud->status=="P")

		<h1 class="text-center">Solicitud de Documentos UCLA</h1>
		<h2 class="text-center">Usted ha hecho una solicitud de Documentos:</h2>
		<p><strong>Código de la Solicitud:</strong> {{ $solicitud->uuid }}</p>
		<p><strong>Nombre del Solicitante:</strong> {{ $solicitud->user->name }}</p>
		<p><strong>Cedula del Solicitante:</strong> {{ $solicitud->user->cedula }}</p>
		<p><strong>Carrera:</strong> {{ $solicitud->carrera->nombre }}</p>
		<p><strong>Documentos Solicitados:</strong></p>
		
		@php
		$total=0;
		@endphp
		<ul>
			@foreach($solicitud->solicitudes_documentos as $documento)
			@php
			$total = $total+$documento->precio_fact;
			@endphp
			<li>{{ $documento->precio_fact }}</b> Bs.S {{ $documento->documento->nombre }}</li>
			@endforeach
		</ul>


		<p><strong>Total:</strong> {{ $total }} Bs.S</p>
		<p><strong>Status: </strong>Pendiente</p>
		<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud->created_at->format('d-m-Y') }}</p>

	@elseif($solicitud->status=="E")

	<h1 class="text-center">Tu solicitud está en proceso de culminación</h1>
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud->user->cedula }}</p>
	<p><strong>Carrera:</strong> {{ $solicitud->carrera->nombre }}</p>
	<p><strong>Documentos Solicitados:</strong></p>
	
	@php
	$total=0;
	@endphp
	<ul>
		@foreach($solicitud->solicitudes_documentos as $documento)
		@php
		$total = $total+$documento->precio_fact;
		@endphp
		<li>{{ $documento->precio_fact }}</b> Bs.S {{ $documento->documento->nombre }}</li>
		@endforeach
	</ul>


	<p><strong>Total:</strong> {{ $total }} Bs.S</p>
	<p><strong>Status: </strong>En proceso</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud->created_at->format('d-m-Y') }}</p>
	<p><strong>Fecha Procesada:</strong> {{ $solicitud->updated_at->format('d-m-Y') }}</p>

	@elseif($solicitud->status=="A")

	<h1 class="text-center">Tu solicitud ha sido aprobada, puedes ir a retirar tus documentos</h1>
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud->uuid }}</p>
		<p><strong>Nombre del Solicitante:</strong> {{ $solicitud->user->name }}</p>
		<p><strong>Cedula del Solicitante:</strong> {{ $solicitud->user->cedula }}</p>
		<p><strong>Carrera:</strong> {{ $solicitud->carrera->nombre }}</p>
		<p><strong>Documentos Solicitados:</strong></p>
		
		@php
		$total=0;
		@endphp
		<ul>
			@foreach($solicitud->solicitudes_documentos as $documento)
			@php
			$total = $total+$documento->precio_fact;
			@endphp
			<li>{{ $documento->precio_fact }}</b> Bs.S {{ $documento->documento->nombre }}</li>
			@endforeach
		</ul>


		<p><strong>Total:</strong> {{ $total }} Bs.S</p>
		<p><strong>Status: </strong>Aprobado</p>
		<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud->created_at->format('d-m-Y') }}</p>
		<p><strong>Fecha de Aprobación:</strong> {{ $solicitud->updated_at->format('d-m-Y') }}</p>

	@endif

	<h2 class="text-center">Gracias por usar nuestro servicio!!</h2>

</body>
</html>