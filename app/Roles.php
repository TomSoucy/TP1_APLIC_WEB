<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public function roles(){
        return $this->belongsToMany('App\Users', 'id', 'id');
    }
}
