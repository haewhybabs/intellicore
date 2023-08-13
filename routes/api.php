<?php

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
use App\Http\Controllers\CodeController;

Route::post('/allocate-code', [CodeController::class, 'allocateCode']);
Route::post('/allocate-code-randomly', [CodeController::class, 'allocateRandomCodes']);
Route::put('/reset-code', [CodeController::class, 'resetCode']);
Route::put('/code-status', [CodeController::class, 'codeStatus']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
