@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Lista de Usuarios <span class="badge">{{ count($users) }}</span></li>
	</ol>

	@if(count($users)>0)
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->cedula }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->address }}</td>
					<td>{{ $user->phone }}</td>
					<td>
						<a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary">Editar Usuario</a>
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