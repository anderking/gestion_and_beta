<!DOCTYPE html>
<html>
    <head>
        <title>404</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <style>

            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .jumbotron{
                margin: 8em 0 ;
            }

        </style>
    </head>
    <body class="notfound">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="text-center">Oops! error 404</h1>
                        <h2 class="text-center">La página no existe o no tienes permisos para acceder</h2>
                        <p>
                            <div class="text-center">

                            @if(Auth::user())
                                @if (Auth::user()->hasRole('admin'))
                                    <a href="{{ url('administrador') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('estudiante'))
                                    <a href="{{ url('estudiante') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('directoradm'))
                                    <a href="{{ url('directoradm') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('directorpro'))
                                    <a href="{{ url('directorpro') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('docente'))
                                    <a href="{{ url('docente') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('secretario'))
                                    <a href="{{ url('secretario') }}" class="btn btn-primary">Regresar</a>
                                @endif
                                @if (Auth::user()->hasRole('encargadoserv'))
                                    <a href="{{ url('encargadoserv') }}" class="btn btn-primary">Regresar</a>
                                @endif
                            @else
                                <div class="text-center"><a href="{{ url('/') }}" class="btn btn-primary">Regresar</a></div>
                            @endif

                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
