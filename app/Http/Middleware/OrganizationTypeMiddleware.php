<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationTypeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has type = 1
        if (auth()->check() && auth()->user()->type == 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.'); // Redirect to 403 page if not authorized
    }
}