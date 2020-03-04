<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Critics extends Model
{
    protected $table = 'critics';

    public function critics(){
        return $this->hasMany('App\User', 'id', 'user_id');

        return $this->hasMany('App\Films', 'id', 'film_id');
    }
}

