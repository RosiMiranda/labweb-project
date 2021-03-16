<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ShoppingCart extends Model{

    public function products()
    {
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

}
