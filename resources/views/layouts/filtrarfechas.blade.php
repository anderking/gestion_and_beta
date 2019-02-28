@if(Auth::user()->hasRole('directoradm'))

	@if(Route::getCurrentRoute()->getName()=="sugerencia.index")

	{!! Form::open(array('route' => 'sugerencia.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="solicitud.index")

	{!! Form::open(array('route' => 'solicitud.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="programa.index")

	{!! Form::open(array('route' => 'programa.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="reportedocumentos.index")

	{!! Form::open(array('route' => 'reportedocumentos.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="reporteprogramas.index")

	{!! Form::open(array('route' => 'reporteprogramas.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="reporteservicios.index")

	{!! Form::open(array('route' => 'reporteservicios.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="sugerencia.index")

	{!! Form::open(array('route' => 'sugerencia.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="solicitudservicio.index")

	{!! Form::open(array('route' => 'solicitudservicio.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

@elseif(Auth::user()->hasRole('directorpro'))

{!! Form::open(array('route' => 'programa.index','method' => 'GET','class'=>'form-horizontal')) !!}

@elseif(Auth::user()->hasRole('secretario'))

{!! Form::open(array('route' => 'solicitud.index','method' => 'GET','class'=>'form-horizontal')) !!}

@elseif(Auth::user()->hasRole('docente') || Auth::user()->hasRole('encargadoserv'))

{!! Form::open(array('route' => 'solicitudservicio.index','method' => 'GET','class'=>'form-horizontal')) !!}

@elseif(Auth::user()->hasRole('estudiante'))

	@if(Route::getCurrentRoute()->getName()=="solicitud.index")

	{!! Form::open(array('route' => 'solicitud.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

	@if(Route::getCurrentRoute()->getName()=="programa.index")

	{!! Form::open(array('route' => 'programa.index','method' => 'GET','class'=>'form-horizontal')) !!}

	@endif

@endif

	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
			{!! Form::label('desde', 'Desde:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			{!! Form::date('desde', date('Y-m-d'), ['id'=>'desde','class'=>'form-control','required']) !!}
		</div>
		<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
			{!! Form::label('hasta', 'Hasta:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			{!! Form::date('hasta', date('Y-m-d'), ['id'=>'hasta','class'=>'form-control','required']) !!}
		</div>

	@if(Auth::user()->hasRole('directoradm') || Auth::user()->hasRole('directorpro') || Auth::user()->hasRole('secretario'))
	

		@if(Route::getCurrentRoute()->getName()=="reportedocumentos.index" || Route::getCurrentRoute()->getName()=="reporteprogramas.index" || Route::getCurrentRoute()->getName()=="reporteservicios.index")
		<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
			{!! Form::label('status', 'Status:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			<select class="form-control" name="status">
				<option value="">Seleccione un Status</option>
				<option value="P">Pendiente</option>
				<option value="C">Cancelado</option>
				<option value="R">En Revisión</option>
				<option value="E">En Proceso</option>
				<option value="A">Culminado</option>
			</select>
		</div>
		<!--<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
			{!! Form::label('cedula', 'Cédula:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			{!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Cedula']) !!}
		</div>-->
		@endif

		@if(Route::getCurrentRoute()->getName()=="solicitud.index" || Route::getCurrentRoute()->getName()=="programa.index" || Route::getCurrentRoute()->getName()=="solicitudservicio.index" || Route::getCurrentRoute()->getName()=="sugerencia.index")
		<!--<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
			{!! Form::label('cedula', 'Cédula:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
		    {!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Cedula']) !!}
		</div>-->
		@endif
	@endif

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<br class="visible-xs">
			<input type="submit" class="btn btn-primary" value="Filtrar">
		</div>

	</div>
	<br>

{!! Form::close() !!}