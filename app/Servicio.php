<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
	protected $fillable = ['tipo_servicio','nombre','descripcion'];

	public function tipo_servicio()
	{
  	return $this->belongsTo('App\TipoServicio');
	}
	public function items()
	{
  	return $this->hasMany('App\Item');
	}

  public function solicitudes_servicio()
  {
      return $this->hasMany('App\SolicitudServicio');
  }
}
