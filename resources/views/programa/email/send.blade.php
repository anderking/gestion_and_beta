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
	@if($solicitud_programa->status=="P")

	<h1 class="text-center">Solicitud de Programa UCLA</h1>
	<h2 class="text-center">Usted ha hecho una solicitud de Programa:</h2>
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_programa->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_programa->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_programa->user->cedula }}</p>
	<p><strong>Carrera:</strong> {{ $solicitud_programa->carrera->nombre }}</p>
	<p><strong>Pensum Solicitado:</strong> {{ $solicitud_programa->pensum->nombre }}</p>
	<p><strong>Total:</strong> {{ $solicitud_programa->precio_fact }} Bs.S</p>
	<p><strong>Status: </strong>Pendiente</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_programa->created_at->format('d-m-Y') }}</p>

	@elseif($solicitud_programa->status=="E")

	<h1 class="text-center">Tu solicitud está en proceso de culminación</h1>
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_programa->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_programa->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_programa->user->cedula }}</p>
	<p><strong>Carrera:</strong> {{ $solicitud_programa->carrera->nombre }}</p>
	<p><strong>Pensum Solicitado:</strong> {{ $solicitud_programa->pensum->nombre }}</p>
	<p><strong>Total:</strong> {{ $solicitud_programa->precio_fact }} Bs.S</p>
	<p><strong>Status: </strong>Pendiente</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_programa->created_at->format('d-m-Y') }}</p>
	<p><strong>Fecha Procesada:</strong> {{ $solicitud_programa->updated_at->format('d-m-Y') }}</p>

	@elseif($solicitud_programa->status=="A")

	<h1 class="text-center">Tu solicitud ha sido aprobada, puedes ir a retirar tus documentos</h1>
	<p><strong>Código de la Solicitud:</strong> {{ $solicitud_programa->uuid }}</p>
	<p><strong>Nombre del Solicitante:</strong> {{ $solicitud_programa->user->name }}</p>
	<p><strong>Cedula del Solicitante:</strong> {{ $solicitud_programa->user->cedula }}</p>
	<p><strong>Carrera:</strong> {{ $solicitud_programa->carrera->nombre }}</p>
	<p><strong>Pensum Solicitado:</strong> {{ $solicitud_programa->pensum->nombre }}</p>
	<p><strong>Total:</strong> {{ $solicitud_programa->precio_fact }} Bs.S</p>
	<p><strong>Status: </strong>Pendiente</p>
	<p><strong>Fecha de la Solicitud:</strong> {{ $solicitud_programa->created_at->format('d-m-Y') }}</p>
	<p><strong>Fecha de Aprobación:</strong> {{ $solicitud_programa->updated_at->format('d-m-Y') }}</p>

	@endif

	<h2 class="text-center">Gracias por usar nuestro servicio!!</h2>

</body>
</html>