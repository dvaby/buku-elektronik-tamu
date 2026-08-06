<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasPermission
{
    public function handle(Request $request, Closure $next, string ...$permissions): mixed
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if ($user->hasPermissionForAny($permissions)) {
            return $next($request);
        }

        abort(403);
    }
}
