<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = "sinhvien";

    public function lop(){
        return $this->belongsTo('App\lop','idlop','id');
    }

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
   
}
