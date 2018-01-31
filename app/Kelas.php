<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan','id_jurusan');
    }
}
