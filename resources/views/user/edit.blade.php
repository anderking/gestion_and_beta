@extends('layouts.estudiante')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">User</li>
	</ol>
	
	@include('common.success')
	@include('common.errors')
	
	<div class="page-header">
		<h3 style="text-align: center">Actualizar Datos</h3>
	</div>

	<div class="panel panel-default" >
		<div class="panel-heading">Información Básica</div>
		<div class="panel-body">
			{!! Form::open(array('route' => ['user.update',$user],'method' => 'PUT','files' => true)) !!}

				@if(Auth::user()->hasRole('admin'))

				<div class="form-group">
					<label>Cédula</label>
					<input type="text"class="form-control" name="cedula" value="{{ $user->cedula }}"  id="txtNombre" placeholder="Introduzca su Cedula">
				</div>

				@endif

				<div class="form-group">
					<label>Nombre</label>
					<input type="text"class="form-control" name="name" value="{{ $user->name }}"  id="txtNombre" placeholder="Introduzca su nombre">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" value="{{ $user->email }}"  id="txtApellido" placeholder="Introduzca su apellido">

				</div>
				
				<div class="form-group">
					<label>Dirección</label>
					<input type="text" class="form-control" name="address" value="{{ $user->address }}"  id="txtDireccion" placeholder="Introduzca su direcciòn">
				</div>
				
				<div class="form-group">
					<label>Teléfono</label>
					<input type="text" class="form-control" name="phone" value="{{ $user->phone }}"  id="txtphone" placeholder="Introduzca su telefono">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" value="" id="textpassword" placeholder="Nuevo Password">
				</div>

				<div class="form-group">
					<label>Actualizar Foto de Perfil</label>
					<input type="file" name="avatar">
					
				</div>

				<button type="submit" id="btnEnviar" class="btn btn-primary">Actualizar</button>
				<!--<a href="{{ route('user.show',$user->id) }}" class="btn btn-default">Regresar</a>-->
			{!! Form::close() !!}
		</div>
	</div>

</div>
@endsection