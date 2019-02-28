<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = 'solicitud_servicios';
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

    public function scopeFiltrarFechaCedula($query,$desde,$hasta,$cedula)
    {
        return $query->join('users', 'solicitud_servicios.user_id', '=', 'users.id')->whereDate('solicitud_servicios.created_at','>=',$desde)->whereDate('solicitud_servicios.created_at','<=',$hasta)->where('users.cedula','=',$cedula)->orderBy('solicitud_servicios.created_at','DESC');
    }
    public function scopeFiltrarFechaStatusCedula($query,$desde,$hasta,$status,$cedula)
    {
        return $query->join('users', 'solicitud_servicios.user_id', '=', 'users.id')->whereDate('solicitud_servicios.created_at','>=',$desde)->whereDate('solicitud_servicios.created_at','<=',$hasta)->whereIn('status',[$status])->where('users.cedula','=',$cedula)->orderBy('solicitud_servicios.created_at','DESC');
    }
}
