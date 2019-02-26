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
}
