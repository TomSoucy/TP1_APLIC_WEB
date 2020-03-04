<?php

//namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
//namespace App\Http\AuthControllers;

use Illuminate\Http\Request;
use App\Roles;
use Hash;
use App\User;
use App\Http\Resources\Users;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    public function index(Request $request){
        echo $request;
    }

    public function store(userRequest $request){
        $request->merge(['password' => Hash::make($request->password)]);
        $user = new User($request->all());
        $user->save();

        $token = $user->createToken('Token')->accessToken;
        return $token;
    }


    public function update(Request $request, $id){
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::find($id);
        if(request("last_name") != ""){
            $user->last_name = request('last_name');
        }
        if(request("email") != ""){
            $user->email = request('email');
        }
        if(request('password') != ""){
            $user->password = request('password');
        }
        if(request('login') != ""){
            $user->login = request('login');
        }
        if(request('first_name') != ""){
            $user->first_name = request('first_name');
        }
        if(request('role_id') != ""){
            $user->role_id = request('role_id');
        }
        $user->save();
    }

}


