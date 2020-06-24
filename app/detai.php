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
    public function tiendo()
    {
        return $this->hasMany('App\tiendo','iddetai','id');
    }
    public function nghiemthu()
    {
        return $this->hasMany('App\lop','iddetai','id');
    }
    public function source()
    {
        return $this->hasMany('App\lop','iddetai','id');
    }
}
