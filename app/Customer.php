<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function basket(){
        return $this->hasMany('App\Basket');
    }
}
