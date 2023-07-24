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
}
