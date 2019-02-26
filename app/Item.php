<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'items';
  protected $fillable = ['servicio_id','nombre','descripcion'];

  public function servicio()
  {
    return $this->belongsTo('App\Servicio');
  }

  public function solicitud_items()
  {
  	return $this->hasMany('App\SolicitudItem');
  }

}
