@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" accept-charset="utf-8" action="{{ route('login') }}">
                {{ csrf_field() }}


               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                <span id="reauth-email" class="reauth-email"></span>
                <input id="email" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                     @endif


                   </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                <input id="password" type="password" class="form-control" placeholder="Contraseña" value="" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                    </div>

                <button type="submit" class="btn btn-primary btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
                <button type="button" class="btn btn-danger" name="login" id="cancelar" onclick= "self.location.href = '/' ">Cancelar</button>
            </form>

        </div>
    </div>
@endsection
