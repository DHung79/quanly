<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detai extends Model
{
    protected $table = "detais";
    
    public function tacgia(){
        return $this->belongsTo('App\user','idtacgia','id');
    }
    public function giangvien(){
        return $this->belongsTo('App\giangvien','idgvhd','id');
    }
}
