<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
	protected $table = 'solicitudes';
	protected $fillable = ['uuid','user_id','carrera_id','email','pago_img','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }
    
    public function solicitudes_documentos()
    {
        return $this->hasMany('App\SolicitudDocumento');
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
        return $query->join('users', 'solicitudes.user_id', '=', 'users.id')->whereDate('solicitudes.created_at','>=',$desde)->whereDate('solicitudes.created_at','<=',$hasta)->where('users.cedula','=',$cedula)->orderBy('solicitudes.created_at','DESC');
    }

    public function scopeFiltrarFechaStatusCedula($query,$desde,$hasta,$status,$cedula)
    {
        return $query->join('users', 'solicitudes.user_id', '=', 'users.id')->whereDate('solicitudes.created_at','>=',$desde)->whereDate('solicitudes.created_at','<=',$hasta)->whereIn('status',[$status])->where('users.cedula','=',$cedula)->orderBy('solicitudes.created_at','DESC');
    }

}
