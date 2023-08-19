<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function purchase($user_id, $product_id) {        
        return Purchase::where('user_id', $user_id)->where('product_id', $product_id)->exists();       
        }
//     public function purchase(){
//         return $this->hasOne('App\Product');
// }
}