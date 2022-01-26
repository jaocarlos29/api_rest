<?php

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

// Route::prefix('talhao')->group(function () {
//     Route::get('/index', [UsuarioController::class, 'index']);
//     Route::post('/store', [UsuarioController::class, 'store']);
//     Route::get('/show/{id}', [UsuarioController::class, 'show']);
//     Route::put('/update/{id}', [UsuarioController::class, 'update']);
//     Route::delete('/destroy/{id}', [UsuarioController::class, 'destroy']);
// });

// Route::prefix('plantas')->group(function () {
//     Route::get('/index', [UsuarioController::class, 'index']);
//     Route::post('/store', [UsuarioController::class, 'store']);
//     Route::get('/show/{id}', [UsuarioController::class, 'show']);
//     Route::put('/update/{id}', [UsuarioController::class, 'update']);
//     Route::delete('/destroy/{id}', [UsuarioController::class, 'destroy']);
// });
    // Route::get('/index', [Usuario::class, 'index']);

