<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function authenticate($email, $password): boolval {
        $foundUser = User::firstWhere("email", $email)->firstOrFail();
        if(Hash::check($password, $foundUser["password"])) {
            return true;
        }
        return false;
    }

    public function registerUser(Request $request) {
        return User::create([
            'name' =>  $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }

    public function logUser(Request $request) {
        $incomingData = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $this->authenticate($incomingData["email"], $incomingData["password"]);

        return $incomingData;
    }
}