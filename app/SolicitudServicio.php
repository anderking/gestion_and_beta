<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
  protected $table = 'solicitud_servicio';
	protected $fillable = ['user_id','departamento_id','servicio_id','observaciones','status'];

  public function user()
  {
   	return $this->belongsTo('App\User');
  }

  public function departamento()
  {
    return $this->belongsTo('App\Departamento');
  }

  public function servicio()
  {
    return $this->belongsTo('App\Servicio');
  }
  
  public function solicitud_servicio_items()
  {
      return $this->hasMany('App\SolicitudServicioItem');
  }
}
