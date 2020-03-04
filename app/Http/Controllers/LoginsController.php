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
    /*
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQxYmQwOWFkNDExYzAwNGY1NWEwYjBmY2FlMTQ5ZjUwYWNlNmI4OWI5MWIxNjUyNDAwZWU5ZTYzMzBjNjExMTdlMDIzMzRhMWZlODk0MDciLCJpYXQiOjE1ODMzNTU4MTMsIm5iZiI6MTU4MzM1NTgxMywiZXhwIjoxNjE0ODkxODEzLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.Gf3iy4uVosPe-ui1ERVNMm8vyk0Bf9TRq7OfjcCkTUJzrTDYEzSgit8zuN0xj9yS0YSaYOWmLD2hLuZy95xc-1PPg60K2q8quhZd4OtpGKlg7f_uqjfm9A0avV5a9porf_uL9VOfnc7Gbxh1HvO286jNMXDGIMATUVbvlr5NZR97NkgZH3Nqjc2ld3CghVQGEbnoK0Hr3Lu6vSHBQ8G7ZIS_wuU43c_9lql68p8-8jetagx82Uq7y1Zxlwm5T764TrcAcQ98LQXEGvHQdbz7RDy8HphWryXMRhfzk3kNHCJU_UID0RA6_MDah4HRoy4oawZsqrj2jlQdfuiGQvGOA7LOoqqaSlCWu8d4zu5aIrEgvqVFwsegmD41oDO_oddHSLxYAnJ3RqLoSrTl2I9xO06RfNSh9d49DCn5iZcwaSEWwwAFTnp8CnPZQFIOP-VmmqLhx0nU3h3gu5LQ7jGd1YsSm9oWXB5NTmtl4Xnmmf1dJ8usVxsOIlSFCAnUaKlBYZcQkCQksgFGh7qTTibLZS2UJv4P9wLC2b73qq1Z0QAXaRGMCa_UuojL-8pcokZK07YrpBpOhrm_Cbq5evUtdpBQISqsTq3dfLeJUP4Eoo5Ejle0RTeAju7xPfku6qSw0jXZRkNKZSfGwx9Pd_c3PpgcHBjV8z8tjd3gjDbXOpw
    */

}


