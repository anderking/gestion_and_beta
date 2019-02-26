<?php

namespace App;
use App\Documento;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
   protected $table = 'carreras';
   protected $fillable = ['nombre'];

   public function solicitud_programas()
   {
   		return $this->hasMany('App\SolicitudPrograma');
   }

   public function solicitudes()
   {
         return $this->hasMany('App\Solicitud');
   }

   public function precio_programas()
   {
         return $this->hasMany('App\PrecioPrograma');
   }

   public function precio_documentos()
   {
         return $this->hasMany('App\PrecioDocumento');
   }
}
