<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BakatMinatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KesenianController;


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

Route::get("kategori/index",[KategoriController::class, "index"]);
Route::post("kategori/store",[KategoriController::class, "store"]);
Route::get("kategori/show/{id}",[KategoriController::class, "show"]);
Route::post("kategori/update/{id}",[KategoriController::class, "update"]);
Route::delete("kategori/destroy/{id}",[KategoriController::class, "destroy"]);

Route::get("kesenian/index",[KesenianController::class, "index"]);
Route::post("kesenian/store",[KesenianController::class, "store"]);
Route::get("kesenian/show/{id}",[KesenianController::class, "show"]);
Route::post("kesenian/update/{id}",[KesenianController::class, "update"]);
Route::delete("kesenian/destroy/{id}",[KesenianController::class, "destroy"]);

//pdbabm
Route::post("v1/pdbabm/simpan",[BakatMinatController::class, "store"]);


