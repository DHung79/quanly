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
        return $this->hasMany('App\nghiemthu','iddetai','id');
    }
    public function source()
    {
        return $this->hasMany('App\source','iddetai','id');
    }
    public function thanhvien()
    {
        return $this->hasMany('App\thanhvien','iddetai','id');
    }
}
