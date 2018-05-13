<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$usertype=null)
    {
        // dd(Auth::guard('company')->check());
        if(Auth::guard('company')->check() && $usertype == "company"){
          return $next($request);
        }
        else if(Auth::guard('member')->check() && $usertype == "member"){
          return $next($request);
        }
        Session::flash('alert','You are not allowed to access that page!');
        Session::flash('alert-type','failed');
        return redirect(route('home'));
    }
}
