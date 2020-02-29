<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    protected $table = 'actors';
    public function actorFilm(){
        return $this->belongsToMany('App\ActorFilm', 'film_id', 'film_id');
    }
}
