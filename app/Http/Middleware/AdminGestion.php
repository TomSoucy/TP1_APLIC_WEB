<?php

namespace App\Http\Middleware;

use Closure;

class AdminGestion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
    
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    if (Auth::user()->role == 1) {
        return redirect()->route('admin');
    }
    if (Auth::user()->role == 2) {
        return redirect()->route('user');
    }
}
}

/* public function isAdmin()
{
  if($this->status == 'Admin')
   return true;
  else
   return false;
}

public function handle($request, Closure $next) {
    if(!$request->user()->isAdmin())
    {
      return abort(404);
    }
    return $next($request);
} */


//https://dev.to/kaperskyguru/multiple-role-based-authentication-in-laravel-30pc
//https://laracasts.com/discuss/channels/general-discussion/create-middleware-to-auth-admin-users?page=0