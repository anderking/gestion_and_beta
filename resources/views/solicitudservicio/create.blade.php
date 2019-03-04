@extends('layouts.estudiante')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
  
  <ol class="breadcrumb">
    <li><a href="#"><em class="fa fa-home"></em></a></li>
    <li class="active">Solicitu-Servicio</li>
  </ol>

  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif

  <div class="panel panel-default" >
    <div class="panel-heading">Solicitud de Servicios</div>
    <div class="panel-body">
      <form action ="{{ route('solicitudservicio.store') }}" method="POST" role="form">
        {{ csrf_field() }}

        <div class="form-group">
          <label>Seleccione el departamento:</label>
          <select class="form-control" id="departamento_id" name="departamento_id" required>
            <option value="" selected disabled > Seleccione un departamento </option>
            @foreach($departamentos as $departamento)
            <option value="{{$departamento->id}}"> {{$departamento->nombre}} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Seleccione el servicio:</label>
          <select class="form-control" id="servicio_id" name="servicio_id" onChange="selected()" required>
            <option value="" selected disabled > Seleccione un servicio </option>
            @foreach($servicios as $servicio)
            <option value="{{$servicio->id}}"> {{$servicio->nombre}} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          @foreach($servicios as $servicio)
          <div class="checkbox-content" id="{{$servicio->id}}" style="display: none;">
            @foreach($servicio->items as $item)
            <div class="check">
              
              <input id="{{$item->id}}-{{$item->servicio_id}}" class="check-item" value="{{$item->id}}" name="items[]" type="checkbox" onchange="onChecked('{{$item->id}}-{{$item->servicio_id}}')">

              <input id="cant-{{$item->id}}-{{$item->servicio_id}}" type="number" name="cantidad[]" class="form-control-cantidad input-cantidad" min="1" pattern="^[0-9]+" required>
              <label>{{$item->nombre}}</label>
              
            </div>
            @endforeach
          </div>
          @endforeach
         </div>
        
        <div class="form-group">
          <label>Observaciones</label>
          <textarea  id="observaciones" name="observaciones" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label> Correo:</label>
          <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email" required>
        </div>

        <input type ="hidden" name="user_id" value="{{ Auth::user()->id }}">
        
        <button type="submit" class="btn btn-primary">Solicitar</button>

      </form>
    </div>
  </div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">
    
    var idselected;
    var id = 0;

    
    function selected()
    {
      var checkboxs = document.getElementsByClassName('checkbox-content');
      var cantidad = document.getElementsByClassName('input-cantidad');
      var item = document.getElementsByClassName('check-item');
      idselected = document.getElementById('servicio_id');
      
      id = idselected.options[idselected.selectedIndex].value;
      console.log(id);
      
      for (var i = 0; i < checkboxs.length; i++)
      {
        if(checkboxs[i].id==id)
        {
          checkboxs[i].style.display="block"
          $(".check-item").prop('checked', false);
          $(".input-cantidad").prop('disabled', true);
          $('.input-cantidad').val('');
            
          if(id==4)
          {
            for (var j = 0; j < cantidad.length; j++)
            {
              cantidad[j].style.display="inline-block"
            }
          }else{
            for (var j = 0; j < cantidad.length; j++)
            {
              cantidad[j].style.display="none"
            }
          }

        }
        else
        {
          checkboxs[i].style.display="none"
          $(".check-item").prop('checked', false);
          $(".input-cantidad").prop('disabled', true);
          $('.input-cantidad').val('');
          if(id==4)
          {
            for (var j = 0; j < cantidad.length; j++)
            {
              cantidad[j].style.display="none"
            }
          }
        }
      }
    }

    function onChecked(id)
    {
      var checkbox = document.getElementById(id);
      var cantidad = document.getElementById("cant-"+id);
      ids = idselected.options[idselected.selectedIndex].value;

      if( $('#'+id).prop('checked') )
      {
        if(ids==4){
          $("#cant-"+id).prop('disabled', false);
        }

      }else{
        $("#cant-"+id).prop('disabled', true);
      }
    }
    
</script>
@endsection
