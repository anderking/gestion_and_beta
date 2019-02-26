@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
	
	<ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Home</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Panel del Director Administrativo</h1>
		</div>
	</div>

	<div class="panel panel-container" >
		<div class="row" >
			<div class="col-xs-6" style="margin: 0px 0px 0px 10px">
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui rerum quis, pariatur inventore reprehenderit dolor porro eum ipsa blanditiis eveniet saepe eos voluptatem optio quia atque minus. Aut pariatur, porro. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui rerum quis, pariatur inventore reprehenderit dolor porro eum ipsa blanditiis eveniet saepe eos voluptatem optio quia atque minus. Aut pariatur, porro.</p>
			</div>
			<div class="col-xs-4">
				<div class="img-content">
					<img class="img img-responsive img-small" height="300px"  src="{{ asset('img/background-pacfin5.jpg') }}" alt="image">
				</div>
			</div>
		</div>
	</div>

	<div class="panel-body">
		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
	</div>

	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="panel panel-teal panel-widget border-right">
					<br>
					<div class="row no-padding"><em class="fa fa-xl fa fa-folder-o color-blue"></em>
						<br>
						<br>
						<div class="text-muted">Solicitudes de Documentos</div>
						<span class="badge">{{ count($solicitudes) }}</span>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="panel panel-blue panel-widget border-right">
					<br>
					<div class="row no-padding"><em class="fa fa-xl fa fa-folder-o color-blue"></em>
						<br>
						<br>
						<div class="text-muted">Solicitudes de Programa</div>
						<span class="badge">{{ count($solicitud_programas) }}</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection