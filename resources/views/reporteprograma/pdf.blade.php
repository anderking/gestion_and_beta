<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Programa</title>
	
	<style type="text/css">
		body{
			margin: 0;
			font-size: 9px;
		}
		.table {
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}
		table {
			border-collapse: collapse;
		}
		.table .thead-dark th {
		    color: #fff;
		    background-color: #212529;
		    border-color: #32383e;
		}

		.table thead th {
		    vertical-align: bottom;
		    border-bottom: 2px solid #dee2e6;
		}
		.table-sm td, .table-sm th {
		    padding: .3rem;
		}
		.table td, .table th {
		    padding: .75rem;
		    vertical-align: top;
		    border-top: 1px solid #dee2e6;
		}
		th {
		    text-align: inherit;
		}

		.table-sm td, .table-sm th {
		    padding: .3rem;
		}

		.table td, .table th {
		    padding: .75rem;
		    vertical-align: top;
		    border-top: 1px solid #dee2e6;
		}

		/*@page {
		  margin: 0px;
		}*/

	</style>


</head>
<body>

	@if(count($solicitud_programas)>0)
		<table class="table table-sm">
			<thead class="thead-dark">
				<tr>
					<th>Código</th>
					<th>Nombre del Solicitante</th>
					<th>Cedula del Solicitante</th>
					<th>Teléfono del Solicitante</th>
					<th>Correo Enviado</th>
					<th>Carrera</th>
					<th>Pensum</th>
					<th>Descripción</th>
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
					<td>{{ $solicitud_programa->created_at->format('Y-m-d') }}</td>
					<td>{{ $solicitud_programa->updated_at->format('Y-m-d') }}</td>
					<td>
						@if($solicitud_programa->status=="P")
						Pendiente
						@endif
						@if($solicitud_programa->status=="C")
						Cancelada
						@endif
						@if($solicitud_programa->status=="R")
						En Revisión
						@endif
						@if($solicitud_programa->status=="E")
						En Proceso
						@endif
						@if($solicitud_programa->status=="A")
						Culminado
						@endif
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</body>
</html>