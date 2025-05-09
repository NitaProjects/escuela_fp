<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\AvaluacioController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // ✅ NUEVA RUTA /me
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResource('moduls', ModulController::class);
    Route::apiResource('ufs', UfController::class);
    Route::apiResource('professors', ProfessorController::class);
    Route::apiResource('alumnes', AlumneController::class);
    Route::apiResource('avaluacions', AvaluacioController::class);
});

Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Api funciona bien'
    ]);
});
