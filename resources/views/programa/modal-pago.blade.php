<div id="modal-pago-solicitud_programa-{{ $solicitud_programa->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array('route' => ['programa.update',$solicitud_programa],'method' => 'PUT','files' => true)) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center modal-title">Subi capture del pago</h3>
      </div>
      <div class="modal-body">
        {!! Form::file('pago_img', ['required']) !!}
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dissmis="modal">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
