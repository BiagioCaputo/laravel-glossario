<?php

use App\Http\Controllers\Api\WordController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// rotte per le chiamate API
Route::get('/words', [WordController::class, 'index']);
Route::get('/words/{slug}', [WordController::class, 'show']);
Route::post('/words', [WordController::class, 'store']);
Route::delete('/words/{word}', [WordController::class, 'destroy']);
Route::put('/words/{word}', [WordController::class, 'update']);


// rotta per i messaggi
Route::post('/contact-message', [ContactController::class, 'message']);