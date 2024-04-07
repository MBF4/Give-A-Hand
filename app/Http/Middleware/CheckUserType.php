<?php

// app/Http/Middleware/CheckUserType.php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user has type=1
        if (auth()->check() && auth()->user()->type == 1) {
            return $next($request);
        }

        // If not, redirect or handle it as per your application's logic
        abort(403, 'Unauthorized action.');
    }
}
