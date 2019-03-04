@extends('layouts.estudiante')

@section('content')
<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
  
  <ol class="breadcrumb">
    <li><a href="#"><em class="fa fa-home"></em></a></li>
    <li class="active">Documento</li>
  </ol>

  @include('common.success')

  <div class="panel panel-default" >
    <div class="panel-heading">Solicitud de documentos</div>
    <div class="panel-body">
      <form action ="{{ route('solicitud.store') }}" method="POST" role="form">
        
        {{ csrf_field() }}

        <h3>Conceptos</h3>

        <div class="form-group">
          <label>Seleccione la carrera:</label>
          
          <select class="form-control" id="carera_id" name="carrera_id" onChange="selected()" required>
            <option value="" selected disabled > Seleccione una carrera </option>
            @foreach($carreras as $carrera)
            <option value="{{$carrera->id}}"> {{$carrera->nombre}} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          @foreach($carreras as $carrera)
          <div class="checkbox-content" id="{{$carrera->id}}" style="display: none;">
            @foreach($carrera->precio_documentos as $documento)
            <div class="check">
              
              <input id="{{$documento->carrera_id}}-{{$documento->documento_id}}" value="{{$documento->documento_id}}" name="documentos[]" class="check-item" type="checkbox" onchange="onChecked('{{$documento->carrera_id}}-{{$documento->documento_id}}')">

              <label>{{$documento->documento->nombre}}</label>
              <span class="badge">{{$documento->precio}} Bs.S</span>
            </div>
            @endforeach
          </div>
          @endforeach
         </div>

        <div class="form-group">
          <label> Correo:</label>
          <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required>
        </div>

        <input type ="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type ="hidden" name="status" value="P" >

        <button type="submit" class="btn btn-success">Solicitar</button>
      </form>
    </div>
  </div>
</div>

		<!--FIN BARRA PANEL DE SOLICITUD-->



@endsection

@section('scripts')

<script type="text/javascript">
    
    var idselected;
    var id = 0;
    
    function selected()
    {
      var checkboxs = document.getElementsByClassName('checkbox-content');
      var item = document.getElementsByClassName('check-item');

      idselected = document.getElementById('carera_id');
      id = idselected.options[idselected.selectedIndex].value;
      
      for (var i = 0; i < checkboxs.length; i++)
      {
        if(checkboxs[i].id==id)
        {
          checkboxs[i].style.display="block"
          $(".check-item").prop('checked', false);

        }
        else
        {
          checkboxs[i].style.display="none"
          $(".check-item").prop('checked', false);

        }
      }
    }

    function onChecked(id)
    {
        var checkbox = document.getElementById(id);
    }
    
</script>

@endsection
