<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Manager;

class ManagerAuth
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
        if ($auth = Auth::user())
        {
            $username =$auth->username;
            $manager = Manager::where('username', $username)->first();

            if ( count($manager ))
            {
                return $next($request);
            }

        }
        return redirect('/');
    }
}
