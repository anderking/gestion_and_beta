<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','display_name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
