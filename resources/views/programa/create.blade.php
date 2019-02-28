@extends('layouts.estudiante')

@section('content')

<div class="col-sm-offset-5 col-sm-7 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9 main main_solicitud_create">
  
  <ol class="breadcrumb">
    <li><a href="#"><em class="fa fa-home"></em></a></li>
    <li class="active">Programa</li>
  </ol>

  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif

  <div class="panel panel-default" >
    <div class="panel-heading">Solicitud de Programas Academicos</div>
    <div class="panel-body">
      <form action ="{{ route('programa.store') }}" method="POST" role="form">
        {{ csrf_field() }}

        <div class="form-group">
          <label>Seleccione la carrera:</label>
          <select class="form-control" id="carrera_id" name="carrera_id" onChange="selected()" required>
            <option value="" selected disabled > Seleccione una carrera </option>
            @foreach($carreras as $carrera)
            <option value="{{$carrera->id}}"> {{$carrera->nombre}} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          @foreach($carreras as $carrera)
          <div class="checkbox-content" id="{{$carrera->id}}" style="display: none;">
            @foreach($carrera->precio_programas as $programa)
            <div class="check">
              
              <input id="ch-{{$programa->carrera_id}}-{{$programa->pensum_id}}" value="{{$programa->pensum_id}}" name="pensum_id" type="radio" onchange="onChecked('ch-{{$programa->carrera_id}}-{{$programa->pensum_id}}')" required>

              <label>{{$programa->pensum->nombre}}</label>
              <span class="badge">{{$programa->precio}} Bs.S</span>
            </div>
            @endforeach
          </div>
          @endforeach
         </div>
        
        <div class="form-group">
          <label>Solicita programa para:</label>
          <textarea  id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label> Correo:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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
      idselected = document.getElementById('carrera_id');
      
      id = idselected.options[idselected.selectedIndex].value;
      
      for (var i = 0; i < checkboxs.length; i++)
      {
        if(checkboxs[i].id==id)
        {
          checkboxs[i].style.display="block"
        }
        else
        {
          checkboxs[i].style.display="none"
        }
      }
    }

    function onChecked(id)
    {
        var checkbox = document.getElementById(id);
        var precio = checkbox.value;
    }
    
</script>