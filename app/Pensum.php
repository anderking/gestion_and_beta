<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{
  protected $table = 'pensum';
  protected $fillable = ['nombre'];

  public function solicitud_programas()
  {
    return $this->hasMany('App\SolicitudPrograma');
  }

  public function precio_programas()
  {
    return $this->hasMany('App\PrecioPrograma');
  }

}
