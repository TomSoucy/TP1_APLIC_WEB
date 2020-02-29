<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorFilm extends Model
{
    protected $table = 'actor_film';

    public function actors(){
        return $this->hasMany('App\Actors', 'id', 'actor_id');
    }
}
