<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd($request);
        if (Auth::guard($guard)->check()) {
            return redirect('/myaccount');
        }
        /*else
        {
            Session::flash('status', 'wrong');
            Session::flash('message', 'Your account is not active');
            Auth::logout();
        }*/
        /*else
            return redirect('/login')->with('status', 'wrong')
                ->with('message', 'Your account is not active');*/

        return $next($request);
    }
}
