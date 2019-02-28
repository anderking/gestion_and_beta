@extends('layouts.estudiante')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">User</li>
	</ol>
	
	@include('common.success')
	
	<div class="page-header">
		<h3 style="text-align: center">Mi perfil <p><small>Añade informacion personal para compartir tu perfil</small></p></h3>
	</div>
	@if($user)
	<ul class="list-group">
		<li class="list-group-item"><b>Cedula: </b>{{ $user->cedula }}</li>
		<li class="list-group-item"><b>Name: </b>{{ $user->name }}</li>
		<li class="list-group-item"><b>Email: </b>{{ $user->email }}</li>
		<li class="list-group-item"><b>Address: </b>{{ $user->address }}</li>
		<li class="list-group-item"><b>Phone: </b>{{ $user->phone }}</li>
		<li class="list-group-item"><b>Rol: </b>{{ $rol->display_name }}</li>
	</ul>
	@endif

	<a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary">Editar Información</a>


</div>
@endsection