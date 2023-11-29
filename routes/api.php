<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BakatMinatController;
use App\Http\Controllers\OlahragaController;


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

// Olahraga
Route::get("v1/olahraga/index", [OlahragaController::class, "index"]);
Route::post("v1/olahraga/store", [OlahragaController::class, "store"]);
Route::get("v1/olahraga/show/{id}", [OlahragaController::class, "show"]);
Route::post("v1/olahraga/update/{id}", [OlahragaController::class, "update"]);
Route::delete("v1/olahraga/destroy/{id}", [OlahragaController::class, "destroy"]);