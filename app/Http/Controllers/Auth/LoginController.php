<?php

namespace App\Http\Controllers\Auth;

//use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Resources\Users;
use App\Http\Requests\userRequest;
use App\Roles;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        
        /* $credentialcredentialss = $request->only('login', 'password');
        echo $; */
        if (Auth::attempt($request->only('login', 'password'))){
                $token = Auth::user()->createToken('Token')->accessToken;
                return $token;
            }
            else{
                abort(401, 'Login failed, please try again.');
            }  
    }

    
    
        public function showUser(Users $user)
        {
            if(auth()->user()->id == $user->get('id')){
                return view('display', compact(['id', 'login', 'email' ,'last_name', 'first_name', 'role_id'])->toJson());
        }
            else {
                abort(403, 'Unauthorized to consulte another user informations.');
            }
    }
        public function addUser(userRequest $request){
            $user = $request->validated();
            $user = new \App\Users;
            $user->id = request('id');
            $user->login = request('login');
            $user->email = request('email');
            $user->last_name = request('last_name');
            $user->first_name = request('first_name');
            $user->role_id = request('role_id');
            $user->created_at = request('created_at');
            $user->updated_at = request('updated_at');
            $user->save();
        }
    
        public function update(userRequest $request, $idCritic)
        {
            $film = Users::find($id);
            $user->id = request('id');
            $user->login = request('login');
            $user->email = request('email');
            $user->last_name = request('last_name');
            $user->first_name = request('first_name');
            $user->role_id = request('role_id');
            $user->created_at = request('created_at');
            $user->updated_at = request('updated_at');
            $user->save();
        }
}
