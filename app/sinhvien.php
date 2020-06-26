<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = "sinhviens";

    public function lop(){
        return $this->belongsTo('App\lop','idlop','id');
    }

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
    
    public function thanhvien()
    {
        return $this->hasMany('App\thanhvien','idsv','id');
    }
}
