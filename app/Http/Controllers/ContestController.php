<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContestController extends Controller
{
    public function createContest(Request $request) {
        $validatedRequest = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required'
        ]);

        $validatedRequest['name'] = strip_tags($validatedRequest['name']);
        $validatedRequest['image'] = $validatedRequest['image'];
        $validatedRequest['user_id'] = strip_tags($request['sessionData']['user_id']);
        $validatedRequest['price'] = strip_tags($request['price']);


        return Contest::create($validatedRequest);
    }

    public function getAllUserContests(Request $request) {
        $user = User::find($request['sessionData']['user_id']);
        if($user === null) throw new ErrorException("Could not find a user from session data provided in request");
        return $user->contests;
    }

    public function getAllUserRaffles(Request $request) {
        $user = User::firstWhere('id', $request['sessionData']['user_id']);
        if($user === null) throw new ErrorException("Could not find a user from session data provided in request");
        return $user->raffles;
    }
}
