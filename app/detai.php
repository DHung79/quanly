<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detai extends Model
{
    protected $table = "detais";
    
    public function sinhvien(){
        return $this->belongsTo('App\sinhvien','idsinhvien','id');
    }
    public function giangvien(){
        return $this->belongsTo('App\giangvien','idgvhd','id');
    }
}
