<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        // If UserType is 1, allow full access
        if ($user && $user->type == 1) {
            return $next($request); // Full access for UserType 1
        }

        // Check if user has the required permission
        if (!$user || !getRoleAndPermission($user->type, $permission)) {
            // Redirect back with an error message
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
