<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        // redirect guests to the login page
        if (!Auth::check())
            return redirect('');

        $user = Auth::user();
        foreach ($roles as $role) {
            // authenticate each role
            if ($user->role == $role)
                return $next($request);
        }

        // redirect unauthorized logged in members to the home page
        return redirect('home');
    }
}
