<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Debug untuk melihat user dan role
        logger('RoleMiddleware User: ' . optional($request->user())->email);
        logger('RoleMiddleware Role Required: ' . $role);
        logger('User Actual Role: ' . optional($request->user())->role);

        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
