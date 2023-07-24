<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
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

        return $incomingData;
    }
}