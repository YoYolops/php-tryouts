<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContestController;
use App\Http\Middleware\ValidateRegisterBody;
use App\Http\Middleware\ValidateIncomingToken;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [UserController::class, "registerUser"])->middleware(ValidateRegisterBody::class);
Route::post("/login", [UserController::class, "logUser"]);

Route::middleware([ValidateIncomingToken::class])->group(function () {
    Route::post("/contest", [ContestController::class, "createContest"]);
    Route::get("/contest", [ContestController::class, "getAllUserContests"]);
});