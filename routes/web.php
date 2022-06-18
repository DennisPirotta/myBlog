<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale("it");

Route::get('/', function () {
    return view('welcome');
});

// Show Register form
Route::get('register', [UserController::class, 'create']);

// Create new user
Route::post("/users", [UserController::class, 'store']);

// Logout user
Route::post('/logout',[UserController::class, 'logout']);

// Show Login form
Route::get('/login',[UserController::class, 'login']);

// Login user
Route::post('users/auth',[UserController::class, 'authenticate']);
