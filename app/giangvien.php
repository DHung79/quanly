<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giangvien extends Model
{
    protected $table = "giangvien";

    public function khoa(){
        return $this->belongsTo('App\khoa','idkhoa','id');
    }
    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
}


