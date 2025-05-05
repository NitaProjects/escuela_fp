<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\AvaluacioController;

Route::apiResource('moduls', ModulController::class);
Route::apiResource('ufs', UfController::class);
Route::apiResource('professors', ProfessorController::class);
Route::apiResource('alumnes', AlumneController::class);
Route::apiResource('avaluacions', AvaluacioController::class);
