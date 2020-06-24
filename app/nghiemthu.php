<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nghiemthu extends Model
{
    protected $table = "nghiemthu";

    public function detai(){
        return $this->belongsTo('App\detai','iddetai','id');
    }
}
