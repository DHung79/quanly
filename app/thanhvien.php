<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanhvien extends Model
{
    protected $table = "thanhviens";

    public function detai(){
        return $this->belongsTo('App\detai','iddetai','id');
    }
    public function giangvien(){
        return $this->belongsTo('App\giangvien','idgv','id');
    }
    public function sinhvien(){
        return $this->belongsTo('App\sinhvien','idsv','id');
    }
}
