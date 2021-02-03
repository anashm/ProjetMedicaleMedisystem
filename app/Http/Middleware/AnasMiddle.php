<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AnasMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $logged=Session::get('login');
        //if (! $request->expectsJson()) {
        
        if($logged == 'loggedIn'){
            //dd('not welcome');
           // return redirect('pages.login');
           return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
