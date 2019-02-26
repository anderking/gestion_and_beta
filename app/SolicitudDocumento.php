<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudDocumento extends Model
{
	protected $table = 'solicitud_documento';
   	protected $fillable = ['solicitud_id','documento_id','precio_fact'];

	public function sollicitud()
	{
		return $this->belongsTo('App\Solicitud');
	}

	public function documento()
	{
		return $this->belongsTo('App\Documento');
	}
}
