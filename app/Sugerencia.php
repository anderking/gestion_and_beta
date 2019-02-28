<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugerencia extends Model
{
	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeFiltrarFecha($query,$desde,$hasta)
    {
        return $query->whereDate('created_at','>=',$desde)->whereDate('created_at','<=',$hasta)->orderBy('created_at','DESC');
    }

    public function scopeFiltrarFechaCedula($query,$desde,$hasta,$cedula)
    {
        return $query->join('users', 'sugerencias.user_id', '=', 'users.id')->whereDate('sugerencias.created_at','>=',$desde)->whereDate('sugerencias.created_at','<=',$hasta)->where('users.cedula','=',$cedula)->orderBy('sugerencias.created_at','DESC');
    }
}
