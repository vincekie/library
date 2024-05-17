<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfUser
{
    public function handle(Request $request, Closure $next)
    {
      if ($request->user()->usertype === 'User') {
        // Redirect to the specified route
        return redirect()->route('users-basic');
    }

    // If user type is not "User", proceed with the request
    return $next($request);
    }
}
