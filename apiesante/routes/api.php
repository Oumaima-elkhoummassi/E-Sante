<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Urgence;
use App\Models\Soustype;
use App\Http\Controllers\UrgenceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/urgences', [App\Http\Controllers\UrgenceController::class,'index']);

Route::get('/urgences/{id}', [App\Http\Controllers\UrgenceController::class,'type']);

Route::get('/urgence/{id}', [App\Http\Controllers\UrgenceController::class,'untype']);

Route::get('/typeurgence/{id}', [App\Http\Controllers\UrgenceController::class,'secondtype']);

Route::get('/login/{email}/{mdp}', [App\Http\Controllers\UrgenceController::class,'login']);


Route::get('/connect/{id}', [App\Http\Controllers\UrgenceController::class,'connect']);
Route::get('/deconnect/{id}', [App\Http\Controllers\UrgenceController::class,'deconnect']);



Route::get('/user/{id}', [App\Http\Controllers\UrgenceController::class,'finder']);


Route::get('/message/{idl}/{idr}/{idu}', [App\Http\Controllers\MessageController::class,'index']);

Route::get('/sendmessage/{idl}/{idr}/{idu}/{idp}/{msg}', [App\Http\Controllers\MessageController::class,'sendMessage']);

Route::get('/demandeurg/{id}/{idu}/{nom}/{idtype}', [App\Http\Controllers\UrgenceController::class,'demandeurgence']);



Route::get('/medurg/{id}/', [App\Http\Controllers\UrgenceController::class,'medurgence']);


Route::get('/boitepatient/{id}/', [App\Http\Controllers\UrgenceController::class,'boitepatient']);



Route::get('/ifdemande/{idp}/{idu}/{idtype}', [App\Http\Controllers\UrgenceController::class,'ifdemande']);


Route::get('/medaccept/{id}', [App\Http\Controllers\UrgenceController::class,'medaccept']);

Route::get('/medrefuse/{id}', [App\Http\Controllers\UrgenceController::class,'medrefuse']);

Route::get('/terminer/{id}', [App\Http\Controllers\UrgenceController::class,'terminer']);