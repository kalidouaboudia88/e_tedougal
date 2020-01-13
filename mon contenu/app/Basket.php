<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function order(){
        return $this->belongsTo('App\Order');
    }
    
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function product(){
        return $this->belongsToMany('App\Product');
    }
    
}
