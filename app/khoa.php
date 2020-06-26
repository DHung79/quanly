<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    protected $table = "khoa";

    public function lop()
    {
        return $this->hasMany('App\lop','idkhoa','id');
    }

    public function giangvien()
    {
        return $this->hasMany('App\giangvien','idkhoa','id');
    }
}


