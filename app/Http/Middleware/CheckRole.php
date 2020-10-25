<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($role == 'sa')
            $role = 1;
        elseif($role == 'company')
            $role = 2;
        elseif($role == 'student')
            $role = 3;

        if (Auth::check())
            if (Auth::user()->jenis_user == $role)
                if(Auth::user()->approve == 1)
                    return $next($request);
        // Auth::logout();
        return redirect(route('home'));
    }
}
