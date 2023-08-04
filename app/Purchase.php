<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function purchase(){
        return $this->hasOne('App\Purchase');
}
}