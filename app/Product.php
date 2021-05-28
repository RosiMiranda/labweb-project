<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{


    public function categories(){

        return $this->belongsToMany(Category::class)->withPivot(['category_id']);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ["name", "file_path", "created_at", "updated_at"];

}

