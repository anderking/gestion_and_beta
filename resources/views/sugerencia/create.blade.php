@extends('layouts.estudiante')

@section('title','Sugerencias create')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
  
  <ol class="breadcrumb">
    <li><a href="#"><em class="fa fa-home"></em></a></li>
    <li class="active">Sugerencias y Quejas</li>
  </ol>

  @include('common.success')

  <div class="page-header">
    <h3 style="text-align: center">Sugerencias y Quejas <p><small>Escribe detalladamente lo que deseés compartir con nosotros</small></p></h3>
  </div>

  <form method="POST" action="{{ route('sugerencia.store') }}" >

    {{ csrf_field() }}

    <div class= "form-group">
      <label for="descripción">Descripción</label>
      <textarea name="descripcion" id=descripcion rows= "8" cols="6" placeholder=" Escribe Aquí"class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea>

      @if ($errors->has('descripcion'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('descripcion') }}</strong>
      </span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

</div>

@endsection