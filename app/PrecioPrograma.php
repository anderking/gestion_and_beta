<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioPrograma extends Model
{
	protected $table = 'precio_programas';
   	protected $fillable = ['carrera_id','pensum_id','precio'];

	public function carrera()
	{
		return $this->belongsTo('App\Carrera');
	}

	public function pensum()
	{
		return $this->belongsTo('App\Pensum');
	}
}
