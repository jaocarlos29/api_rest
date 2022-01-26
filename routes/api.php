<?php

use App\Http\Controllers\PlantaController;
use App\Http\Controllers\TalhaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
    dd( $request->user());

});

Route::prefix('usuario')->group(function () {
    Route::get('/index', [UsuarioController::class, 'index']);
    Route::post('/store', [UsuarioController::class, 'store']);
    Route::get('/show/{id}', [UsuarioController::class, 'show']);
    Route::put('/update/{id}', [UsuarioController::class, 'update']);
    Route::delete('/destroy/{id}', [UsuarioController::class, 'destroy']);
});

Route::prefix('talhao')->group(function () {
    Route::get('/index', [TalhaoController::class, 'index']);
    Route::post('/store', [TalhaoController::class, 'store']);
    Route::get('/show/{id}', [TalhaoController::class, 'show']);
    Route::put('/update/{id}', [TalhaoController::class, 'update']);
    Route::delete('/destroy/{id}', [TalhaoController::class, 'destroy']);
});

Route::prefix('planta')->group(function () {
    Route::get('/index', [PlantaController::class, 'index']);
    Route::post('/store', [PlantaController::class, 'store']);
    Route::get('/show/{id}', [PlantaController::class, 'show']);
    Route::put('/update/{id}', [PlantaController::class, 'update']);
    Route::delete('/destroy/{id}', [PlantaController::class, 'destroy']);
});
    // Route::get('/index', [Usuario::class, 'index']);

