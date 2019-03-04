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
	<h1 class="text-center">Solicitud de Servicio UCLA</h1>

	@if($solicitud_servicio->status=="P")

	<h2 class="text-center">Usted ha hecho una solicitud de Servicio:</h2>

	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_servicio->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_servicio->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_servicio->user->cedula }}</p>
	<p><strong>Departamento:</strong> {{ $solicitud_servicio->departamento->nombre }}</p>
	{{-- <p><strong>Tipo de Servicio:</strong> {{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</p> --}}
	<p><strong>Servicio:</strong> {{ $solicitud_servicio->servicio->nombre }} </p>
	<p><strong>Observaciones:</strong> {{ $solicitud_servicio->observaciones }}</p>
	<p><strong>Items:</strong></p>
	<ul>
		@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
		<li>@if($solicitud_servicio_item->cantidad)
			<b>({{ $solicitud_servicio_item->cantidad }} unidades)</b>
			@endif
			{{ $solicitud_servicio_item->item->nombre }}</li>
		@endforeach
	</ul>
	<p><strong>Status: </strong>Pendiente</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_servicio->created_at->format('d-m-Y') }}</p>

	@elseif($solicitud_servicio->status=="E")

	<h1 class="text-center">Tu solicitud está en proceso de culminación</h1>

	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_servicio->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_servicio->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_servicio->user->cedula }}</p>
	<p><strong>Departamento:</strong> {{ $solicitud_servicio->departamento->nombre }}</p>
	<p><strong>Tipo de Servicio:</strong> {{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</p>
	<p><strong>Servicio:</strong> {{ $solicitud_servicio->servicio->nombre }} </p>
	<p><strong>Observaciones:</strong> {{ $solicitud_servicio->observaciones }}</p>
	<p><strong>Items:</strong></p>
	<ul>
		@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
		<li>@if($solicitud_servicio_item->cantidad)
			<b>({{ $solicitud_servicio_item->cantidad }} unidades)</b>
			@endif
			{{ $solicitud_servicio_item->item->nombre }}</li>
		@endforeach
	</ul>
	<p><strong>Status: </strong>En proceso</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_servicio->created_at->format('d-m-Y') }}</p>
	<p><strong>Fecha Procesada:</strong> {{ $solicitud_servicio->updated_at->format('d-m-Y') }}</p>

	@elseif($solicitud_servicio->status=="A")

	<h1 class="text-center">Tu Solicitud de Servicio ha sido solventada</h1>
	
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_servicio->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_servicio->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_servicio->user->cedula }}</p>
	<p><strong>Departamento:</strong> {{ $solicitud_servicio->departamento->nombre }}</p>
	<p><strong>Tipo de Servicio:</strong> {{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</p>
	<p><strong>Servicio:</strong> {{ $solicitud_servicio->servicio->nombre }} </p>
	<p><strong>Observaciones:</strong> {{ $solicitud_servicio->observaciones }}</p>
	<p><strong>Items:</strong></p>
	<ul>
		@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
		<li>@if($solicitud_servicio_item->cantidad)
			<b>({{ $solicitud_servicio_item->cantidad }} unidades)</b>
			@endif
			{{ $solicitud_servicio_item->item->nombre }}</li>
		@endforeach
	</ul>
	<p><strong>Status: </strong>Aprobada</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_servicio->created_at->format('d-m-Y') }}</p>
	<p><strong>Fecha Solventada:</strong> {{ $solicitud_servicio->updated_at->format('d-m-Y') }}</p>

	@endif

	<h2 class="text-center">Gracias por usar nuestro servicio!!</h2>

</body>
</html>