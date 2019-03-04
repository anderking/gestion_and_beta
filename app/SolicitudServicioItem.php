<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicioItem extends Model
{
	protected $table = 'solicitud_servicio_item';
   	protected $fillable = ['solicitud_servicio_id','item_id','cantidad'];

	public function sollicitud_servicio()
	{
		return $this->belongsTo('App\SolicitudServicio');
	}

	public function item()
	{
		return $this->belongsTo('App\Item');
	}

}