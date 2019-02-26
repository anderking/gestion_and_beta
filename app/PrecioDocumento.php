<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioDocumento extends Model
{
	protected $table = 'precio_documentos';
   	protected $fillable = ['carrera_id','documento_id','precio'];

	public function carrera()
	{
		return $this->belongsTo('App\Carrera');
	}

	public function documento()
	{
		return $this->belongsTo('App\Documento');
	}
}