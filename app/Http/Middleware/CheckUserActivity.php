<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maxIdleTime = 15 * 60;
        $lastActivity = session('lastActivityTime', 0);
        $currentTime = time();

        if ($currentTime - $lastActivity > $maxIdleTime && Auth::check()) {
            Auth::logout();
            toastr()->error('Session expired due to inactivity', 'Authentication', ['timeOut' => 3000]);
            return redirect()->route('login')->with('message', 'Session expired due to inactivity.');
        }

        session(['lastActivityTime' => $currentTime]);

        return $next($request);
    }
}
