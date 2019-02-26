<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
  protected $table = 'documentos';
  protected $fillable = ['nombre'];

  public function solicitudes_documentos()
  {
    return $this->hasMany('App\SolicitudDocumento');
  }

  public function precio_documentos()
  {
     return $this->hasMany('App\PrecioDocumento');
  }
}
