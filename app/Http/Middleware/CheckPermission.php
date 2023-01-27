<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
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
        $user  = Auth::user();
        $perms = config('permissions.routes');

        foreach($perms as $route=>$action) {
            if( $request->route()->getName() == $route && !User::isAllowTo($user, $action) ) {
                return redirect('admin');
            }
        }

        return $next($request);
    }
}
