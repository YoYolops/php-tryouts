<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public static function getSessionData($token)
    {
        $sessionFound = Session::firstWhere("token", $token);
        if($sessionFound === null) return null;
        return $sessionFound;
    }

    public function validateSession(Request $request) {
        $sessionFound = Session::firstWhere("token", $request->bearerToken());
        if($sessionFound == null) return response("Token provided is invalid", 401);
        return response($sessionFound, 200);
    }
}
