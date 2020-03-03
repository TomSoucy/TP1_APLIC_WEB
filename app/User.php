<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'login', 'email', 'last_name', 'first_name', 'role_id', 'created_at', 'updated_at'];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// Creating a token without scopes...
//$token = $user->createToken('Token Name')->accessToken;

// Creating a token with scopes...
//$token = $user->createToken('My Token', ['place-orders'])->accessToken;
public function roles() {
    return $this->belongsToMany(Role::class, 'user_role');
}

 public function accesToToken(User $user){
    $token = $user->createToken('Token')->accessToken;
    return (['remember_token'] => $token]);
} 
}

