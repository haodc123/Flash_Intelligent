<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = \Auth::user();
        // if ($user->role == UserRole::Admin) {
        //     return $next($request);
        // } 
        foreach($roles as $role) {
            // Check if user has the role
            if($user->hasRole($role))
                return $next($request);
        }
        
        return redirect("/")->withMyerror("You are not authorized for this action");
        
    }
}
