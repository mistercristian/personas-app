<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ComunaController;
use App\Http\Controllers\api\MunicipioController;
use App\Http\Controllers\api\DepartamentoController;
use App\Http\Controllers\api\PaisController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::apiResource('comunas', ComunaController::class);
Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
Route::get('/comunas', [ComunaController::class , 'index'])->name('comunas');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
Route::get('/comunas/{comuna}', [ComunaController::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');

Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');
Route::post('/municipios', [MunicipioController::class, 'store'])->name('municipios.store');
Route::delete('/municipios/{municipio}', [MunicipioController::class, 'destroy'])->name('municipios.destroy');
Route::put('/municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');
Route::get('/municipios/{municipio}', [MunicipioController::class, 'show'])->name('municipios.show');

Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos');
Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');
Route::put('/departamentos/{departamento}', [DepartamentoController::class, 'update'])->name('departamentos.update');
Route::get('/departamentos/{departamento}', [DepartamentoController::class, 'show'])->name('departamentos.show');

Route::get('/paises',[PaisController::class, 'index'])->name('paises');
Route::post('/paises',[PaisController::class, 'store'])->name('paises.store');
Route::delete('/paises/{pais}', [PaisController::class, 'destroy'])->name('paises.destroy');
Route::put('/paises/{pais}', [PaisController::class, 'update'])->name('paises.update');
Route::get('/paises/{pais}', [PaisController::class, 'show'])->name('paises.show');