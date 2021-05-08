<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    public function users(){
        return $this->belongsTo(User::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'role',
    ];

}

