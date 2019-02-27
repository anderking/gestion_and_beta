<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudPrograma extends Model
{
    protected $table = 'solicitud_programas';
    protected $fillable = ['user_id','carrera_id','pensum_id','descripcion','nrotelefono','email','precio_fact','status','pago_img'];

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
}
