<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    // Verify if there is actually a user with informed email and password, returning its id, or 0.
    public function authenticateLoginCredentials($email, $password): int
    {
        $foundUser = User::firstWhere("email", $email);
        if($foundUser !== null && Hash::check($password, $foundUser["password"])) {
            return $foundUser["id"];
        }
        return 0;
    }

    public function registerUser(Request $request) 
    {
        return User::create([
            'name' =>  $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }

    public function logUser(Request $request) 
    {
        $incomingData = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);


        $userId = $this->authenticateLoginCredentials($incomingData["email"], $incomingData["password"]);
        if($userId !== 0)
        {
            $userSession = Session::updateOrCreate(
                ["user_id" => $userId,],
                ["token" => Uuid::uuid4(),]
            );
            return $userSession;
        }

        return response("Invalid credentials", 404);
    }

    public function getContests(Request $request) {
        
    }
}