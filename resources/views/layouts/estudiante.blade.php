<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Admgestion') }}</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/perfilestudiante.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
	<header>
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('/') }}"><span>Gestion</span>AD</a>
					<ul class="nav navbar-top-links navbar-right">
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<div id="sidebar-collapse" class="sidebar">
						<!--PRIMER CUADRO EN DND ESTA LA FOTO Y NOMBRE DEL USUARIO-->
						<div class="profile-sidebar">
							<div class="profile-userpic">
								<img src="{{asset('img/')}}/{{ Auth::user()->avatar }}" class="img-responsive" alt="">
							</div>

							<div class="profile-usertitle">
								<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
								<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
							</div>
							<div class="clear"></div>
						</div>
						<!--FIN DEL PRIMER CUADRO-->
						<!--SEGUNDO CUADRO EN DND ESTA LA BARRA DE BUSQUEDA-->
						<div class="divider"></div>

						<form role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar...">
							</div>
						</form>
						<!--FIN DEL SEGUNDO CUADRO-->
						<!--TERCER CUADRO DND ESTA EL MENU DE OPCIONES-->
						<ul class="nav menu">

							@if(Auth::user()->hasRole('admin'))
							<li><a href="{{ route('administrador') }}"><em class="fa fa-users">&nbsp;</em> Lista de Usuarios</a></li>
							<li><a href="{{ url('admin') }}"><em class="fa fa-home">&nbsp;</em> Panel de control</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>

							@elseif(Auth::user()->hasRole('directoradm'))

							<li><a href="{{ route('directoradm') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('precioDocumentos.index') }}"><em class="fa fa-dollar">&nbsp;</em> Precio por Documentos</a></li>
							<li><a href="{{ route('precioProgramas.index') }}"><em class="fa fa-dollar">&nbsp;</em> Precio por Pensum</a></li>
							<li><a href="{{ route('solicitud.index') }}"><em class="fa fa-file">&nbsp;</em> Ver Solicitud de Documentos</a></li>
							<li><a href="{{ route('programa.index') }}"><em class="fa fa-file-text">&nbsp;</em> Ver Solicitud de Programas</a></li>
							<li><a href="{{ route('solicitudservicio.index') }}"><em class="fa fa-info-circle">&nbsp;</em> Ver Solicitud de Servicios</a></li>
							<li><a href="{{ route('sugerencia.index') }}"><em class="fa fa-comments">&nbsp;</em> Ver Listado de Sugerencias</a></li>
							<li><a href="{{ route('reportedocumentos.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Reporte de Documentos</a></li>
							<li><a href="{{ route('reporteprogramas.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Reporte de Programas</a></li>
							<li><a href="{{ route('reporteservicios.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> 
							Reporte de Servicios</a></li>

							@elseif(Auth::user()->hasRole('directorpro'))

							<li><a href="{{ route('directorpro') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('programa.index') }}"><em class="fa fa-file-text">&nbsp;</em> Ver Solicitud de Programas</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>

							@elseif(Auth::user()->hasRole('estudiante'))

							<li><a href="{{ route('estudiante') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('solicitud.create') }}"><em class="fa fa-file">&nbsp;</em> Solicitar Documentos</a></li>
							<li><a href="{{ route('programa.create') }}"><em class="fa fa-file-text">&nbsp;</em> Solicitar Programas</a></li>
							<li><a href="{{ route('solicitud.index') }}"><em class="fa fa-file">&nbsp;</em> Ver Solicitud de Documentos</a></li>
							<li><a href="{{ route('programa.index') }}"><em class="fa fa-file-text">&nbsp;</em> Ver Solicitud de Programas</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>
							
							
							@elseif(Auth::user()->hasRole('docente'))

							<li><a href="{{ route('docente') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('solicitudservicio.create') }}"><em class="fa fa-info-circle">&nbsp;</em> Realizar Solicitud Servicio</a></li>
							<li><a href="{{ route('solicitudservicio.index') }}"><em class="fa fa-info-circle">&nbsp;</em> Ver Solicitud de Servicios</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>

							@elseif(Auth::user()->hasRole('secretario'))

							<li><a href="{{ route('secretario') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('solicitud.index') }}"><em class="fa fa-file">&nbsp;</em> Ver Solicitud de Documentos</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>

							@elseif(Auth::user()->hasRole('encargadoserv'))

							<li><a href="{{ route('encargadoserv') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
							<li><a href="{{ route('user.show',Auth::user()->id) }}"><em class="fa fa-user">&nbsp;</em> Perfil</a></li>
							<li><a href="{{ route('solicitudservicio.index') }}"><em class="fa fa-info-circle">&nbsp;</em> Ver Solicitud de Servicios</a></li>
							<li><a href="{{ route('sugerencia.create') }}"><em class="fa fa-comments">&nbsp;</em> Sugerencias &amp;  Quejas</a></li>

							@endif

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"><em class="fa fa-sign-out">&nbsp;</em>Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
						<!--FIN DEL TERCER CUADRO-->
					</div>
					<!--FIN BARRA HORIZONTAL DE OPCIONES-->
				</div>
				@yield('content')
			</div>		
		</div>
	</main>

	<footer>
		<p class="back-link">Gestion AD <a href="https://www.medialoot.com">UCLA.EDU.VE</a></p>
	</footer>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	@yield('scripts')
	
</body>
</html>
