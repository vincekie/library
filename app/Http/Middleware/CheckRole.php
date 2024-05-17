<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect('/auth-login-basic');
        }

        $user = Auth::user();
        if (!in_array($user->usertype, $roles)) {
            // Optionally, you can return a 403 response or redirect to a different page
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
