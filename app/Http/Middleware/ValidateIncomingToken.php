<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Symfony\Component\HttpFoundation\Response;

class ValidateIncomingToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionData = SessionController::getSessionData($request->bearerToken());
        if($sessionData === null) return response("Invalid token provided", 401);
        $request["sessionData"] = $sessionData;
        return $next($request);
    }
}
