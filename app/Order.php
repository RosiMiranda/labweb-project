<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){

        return $this->belongsToMany(Product::class);
    }
    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
}
