<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComunaController;
use App\Http\Controllers\Api\DepartamentoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('api\comunas',[ComunaController::class,'index'])->name('comunas');
Route::apiResource('departamentos', DepartamentoController::class);
