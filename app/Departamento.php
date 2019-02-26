<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
	protected $fillable = ['nombre','descripcion'];

	public function solicitud_servicios()
  	{
    	return $this->hasMany('App\SolicitudServicio');
  	}
}
