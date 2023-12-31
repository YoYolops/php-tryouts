<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidateRegisterBody;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/register', function () { return Inertia::render("Register"); });
Route::get('/tickets', function () { return Inertia::render("Tickets"); });
Route::get('/contests', function () { return Inertia::render("Contests"); });