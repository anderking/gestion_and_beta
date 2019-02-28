<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudPrograma extends Model
{
    protected $table = 'solicitud_programas';
    protected $fillable = ['user_id','carrera_id','pensum_id','descripcion','email','precio_fact','status','pago_img'];

    public function carrera()
    {
    	return $this->belongsTo('App\Carrera');
    }

    public function pensum()
    {
    	return $this->belongsTo('App\Pensum');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
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
        return $query->join('users', 'solicitud_programas.user_id', '=', 'users.id')->whereDate('solicitud_programas.created_at','>=',$desde)->whereDate('solicitud_programas.created_at','<=',$hasta)->where('users.cedula','=',$cedula)->orderBy('solicitud_programas.created_at','DESC');
    }
    public function scopeFiltrarFechaStatusCedula($query,$desde,$hasta,$status,$cedula)
    {
        return $query->join('users', 'solicitud_programas.user_id', '=', 'users.id')->whereDate('solicitud_programas.created_at','>=',$desde)->whereDate('solicitud_programas.created_at','<=',$hasta)->whereIn('status',[$status])->where('users.cedula','=',$cedula)->orderBy('solicitud_programas.created_at','DESC');
    }
}
