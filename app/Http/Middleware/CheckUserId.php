<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user's ID
        $authenticatedUserId = auth()->id();

        // Get the {user} ID from the route parameter
        $userId = $request->route('user')->id;


        // Check if the authenticated user's ID matches the {user} ID
        if ($authenticatedUserId != $userId) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
