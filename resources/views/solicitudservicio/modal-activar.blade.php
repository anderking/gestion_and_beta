<div id="modal-activar-solicitud_servicio-{{ $solicitud_servicio->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array('route' => ['solicitudservicio.update',$solicitud_servicio],'method' => 'PUT','files' => true)) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center modal-title">Aprobar Solicitud</h3>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro de aprobar esta Solicitud?</p>
        <input type="hidden" name="status" value="P">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dissmis="modal">Si</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
