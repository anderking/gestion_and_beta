<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documento</title>
	
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

	@if(count($solicitud_servicios)>0)
		<table class="table table-sm">
			<thead class="thead-dark">
				<tr>
					<th>Código</th>
					<th>Nombre del Solicitante</th>
					<th>Cedula del Solicitante</th>
					<th>Teléfono del Solicitante</th>
					<th>Correo Enviado</th>
					<th>Departamento</th>
					{{-- <th>Tipo Servicio</th> --}}
					<th>Servicio</th>
					<th>Items Solicitados</th>
					<th>Observaciones</th>
					<th>Fecha Solicitada</th>
					<th>Ultima Actualización</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($solicitud_servicios as $solicitud_servicio)
				<tr>
					<td>{{ $solicitud_servicio->uuid }}</td>
					<td>{{ $solicitud_servicio->user->name }}</td>
					<td>{{ $solicitud_servicio->user->cedula }}</td>
					<td>{{ $solicitud_servicio->user->phone }}</td>
					<td>{{ $solicitud_servicio->email }}</td>
					<td>{{ $solicitud_servicio->departamento->nombre }}</td>
					{{-- <td>{{ $solicitud_servicio->servicio->tipo_servicio->nombre }}</td> --}}
					<td>{{ $solicitud_servicio->servicio->nombre }}</td>
					<td>
						<ul>
							@foreach($solicitud_servicio->solicitud_servicio_items as $solicitud_servicio_item)
							<li>
								{{ $solicitud_servicio_item->item->nombre }}
								@if($solicitud_servicio_item->cantidad)
								({{ $solicitud_servicio_item->cantidad }} unidades)
								@endif
							</li>
							@endforeach
						</ul>
					</td>
					<td>{{ $solicitud_servicio->observaciones }}</td>
					<td>{{ $solicitud_servicio->created_at->format('Y-m-d') }}</td>
					<td>{{ $solicitud_servicio->updated_at->format('Y-m-d') }}</td>
					<td>
						@if($solicitud_servicio->status=="P")
						Pendiente
						@endif
						@if($solicitud_servicio->status=="C")
						Cancelada
						@endif
						@if($solicitud_servicio->status=="R")
						En Revisión
						@endif
						@if($solicitud_servicio->status=="E")
						En Proceso
						@endif
						@if($solicitud_servicio->status=="A")
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