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

@elseif(Auth::user()->hasRole('docente'))

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
		<div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
			{!! Form::label('desde', 'Desde:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			{!! Form::date('desde', date('Y-m-d'), ['class'=>'form-control','required']) !!}
		</div>
		<div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
			{!! Form::label('hasta', 'Hasta:',['class'=>'control-label']) !!}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
			{!! Form::date('hasta', date('Y-m-d'), ['class'=>'form-control','required']) !!}
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<input type="submit" class="btn btn-primary btn-lg" value="Filtrar">
		</div>
	</div>
	<br>

{!! Form::close() !!}