<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public function role(){
        return $this->belongsToMany('App\Users', 'role_id', 'id');
    }
}
