<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table='aduan';

     public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
     public function user(){
        return $this->belongsTo('App\User');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar'); //untuk relasi
    }
}
