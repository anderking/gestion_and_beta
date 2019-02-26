@extends('layouts.estudiante')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Perfil</li>
	</ol>
	
	@include('common.success')
	
	<div class="page-header">
		<h3 style="text-align: center">Mi perfil <p><small>Añade informacion personal para compartir tu perfil</small></p></h3>
	</div>

	<div class="panel panel-default" >
		<div class="panel-heading">Información Básica</div>
		<div class="panel-body">
			<form  method="POST"  action="{{ route('perfil.store') }}" > 
				{{ csrf_field() }}

				<div class="form-group">
					<label>Nombre</label>
					<span id="alertNombre" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
						<input type="text"class="form-control" name="name" value="{{ old('firstname') }}"  id="txtNombre" placeholder="Introduzca su nombre" required data-validation-required-message="Por favor introduzca su nombre.">
					</span>
				</div>

				<div class="form-group">
					<label>Apellido</label>
					<span id="alertApellido" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
						<input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"  id="txtApellido" placeholder="Introduzca su apellido" required data-validation-required-message="Por favor introduzca su apellido.">
					</span>
				</div>
				<div class="form-group">
					<label>Dirección</label>
					<span id="alertDireccion" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
						<input type="text" class="form-control" name="address" value="{{ old('address') }}"  id="txtDireccion" placeholder="Introduzca su direcciòn" required data-validation-required-message="Por favor introduzca su direcciòn.">
					</span>
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<span id="alertTelefono" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
						<input type="text" class="form-control" name="phone" value="{{ old('phone') }}"  placeholder="Introduzca su telefono" required data-validation-required-message="Por favor introduzca su telefono.">
					</span>
				</div>

				<div class="form-group">
					<label>Biografìa</label>
					<span id="alertBiography" data-toggle="popover" data-trigger="hover" data-placement="auto" title="" data-content="">
						<textarea rows="6" cols="30"class="form-control" name="biography" value="{{ old('biography') }}"  id="txtBiography" required maxlength="999" style="resize: none" data-validation-required-message="Por favor introduzca su biografia deseada."></textarea>
					</span>
				</div>
				<input type ="hidden" name="user_id" value="{{ Auth::user()->id }}" >

				@if ($errors->has('descripcion'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('descripcion') }}</strong>
				</span>
				@endif

				<div class="form-group">
					<button type="button" id="btnCancel" class="btn btn-danger">Cancelar</button>
					<button type="button" id="btnClean" class="btn btn-warning">Limpiar</button>
					<button type="submit" id="btnEnviar" class="btn btn-primary">Crear</button>
				</div>
			</form>
		</div>
	</div>

</div>
@endsection