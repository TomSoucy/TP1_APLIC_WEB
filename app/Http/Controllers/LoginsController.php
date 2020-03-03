<?php

//namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
//namespace App\Http\AuthControllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
//use AuthenticatesUsers;
use App\Http\Resources\Users;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\Auth;//acceder aux infos d'authenfication
//powerpoint prof: file:///D:/Utilisateurs/Proprio/Downloads/Theorie_-_Laravel_Passport.pdf


class LoginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login() {
        if (Auth::attempt(['login' => $email, 'password' => $password])) {
        
           // Authentication passed...
           return redirect()->intended('login'); //a determiner
        }
    }

    /* public function redirectTo(){
        switch(auth()->user()->name){
            case 'Admin':
                $this->redirectTo = 'login/admin'; //routes a determiner
                return $this->redirectTo;
                break;
            case 'User':
                $this->redirectTo = 'login/user'; //route a determiner
                return $this->redirectTo;
                break;
        }
    } */

    public function showUser(User $user)
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
        $user = new \App\User;
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

    public function update(userRequest $request, $id)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
    /* https://laravel.com/docs/5.8/authentication */

    /* public function showLogin()
    {
    return View::make('connection');
    }

    public function doLogin()
    {
        $rules = array(
            'email'    => 'required|login', 
            'password' => 'required|alphaNum|min:3');
    
    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
        return Redirect::to('login')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password'));
    // send back the input (not the password) so that we can repopulate the form
    }    
    else {
    // create our user data for the authentication
    $userdata = array(
        'email'     => Input::get('login'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        echo 'SUCCESS!';
    } 
    else {        

        // validation not successful, send back to form 
        return Redirect::to('connection');

    } */

