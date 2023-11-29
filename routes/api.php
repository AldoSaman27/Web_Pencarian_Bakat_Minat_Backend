<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BakatMinatController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("auth/register",[UserController::class, "register"]);
Route::post("auth/login",[UserController::class, "login"]);
Route::post("auth/ceking",[UserController::class, "ceking"]);

//pdbabm
Route::post("v1/pdbabm/simpan",[BakatMinatController::class, "store"]);

