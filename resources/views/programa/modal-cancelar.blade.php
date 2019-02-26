<div id="modal-cancelar-solicitud_programa-{{ $solicitud_programa->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array('route' => ['programa.update',$solicitud_programa],'method' => 'PUT','files' => true)) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center modal-title">Cancelar Solicitud</h3>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro de cancelar esta Solicitud?</p>
        <input type="hidden" name="status" value="C">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dissmis="modal">Si</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>