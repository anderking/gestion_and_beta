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

	@if(count($solicitudes)>0)
		<table class="table table-sm">
			<thead class="thead-dark">
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
						Pendiente
						@endif
						@if($solicitud->status=="C")
						Cancelada
						@endif
						@if($solicitud->status=="R")
						En Revisión
						@endif
						@if($solicitud->status=="E")
						En Proceso
						@endif
						@if($solicitud->status=="A")
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