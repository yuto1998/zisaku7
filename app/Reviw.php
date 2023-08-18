<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviw extends Model
{
    public function reviw(){
        return $this->hasOne('App\Product');
    }
}
