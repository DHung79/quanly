<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class source extends Model
{
    protected $table = "source";

    public function detai(){
        return $this->belongsTo('App\detai','iddetai','id');
    }
}
