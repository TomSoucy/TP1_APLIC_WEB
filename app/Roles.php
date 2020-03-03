<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public function roles(){
        return $this->hasMany('App\Users', 'id', 'id');
    }
}
