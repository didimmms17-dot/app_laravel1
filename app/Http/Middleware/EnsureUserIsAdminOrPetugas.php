<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdminOrPetugas
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
