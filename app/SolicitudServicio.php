<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = 'solicitud_servicio';
  	protected $fillable = ['user_id','departamento_id','servicio_id','observaciones','email','status'];

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

    public function scopeFiltrarFecha($query,$desde,$hasta)
    {
      return $query->whereDate('created_at','>=',$desde)->whereDate('created_at','<=',$hasta)->orderBy('created_at','DESC');
    }
    
    public function scopeFiltrarFechaStatus($query,$desde,$hasta,$status)
    {
        return $query->whereDate('created_at','>=',$desde)->whereDate('created_at','<=',$hasta)->whereIn('status',[$status])->orderBy('created_at','DESC');
    }
}
