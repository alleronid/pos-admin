<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $allPermissions =  $user->roles[0]->getPermissionNames()->toArray();
        $requestRoute = request()->route()->getName();
        if (in_array($requestRoute, $allPermissions)) {
            return $next($request);
        }

        return back()->with('error', 'Sorry, You have no permission');
    }
}
