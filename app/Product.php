<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public function store(){
    //     return $this->belongsto('id')
    // }
     public function likes(){
        return $this->hasMany('App\Like');
    }
    // public function like_exist($user_id, $product_id) {        
    //     return Like::where('user_id', $user_id)->where('product_id', $product_id)->exists();       
    //     }
}
