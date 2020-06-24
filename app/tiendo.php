<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiendo extends Model
{
    protected $table = "tiendo";

    public function detai(){
        return $this->belongsTo('App\detai','iddetai','id');
    }
}
