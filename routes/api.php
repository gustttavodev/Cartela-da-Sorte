<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cartela\CartelaController;
use App\Http\Controllers\Sorteio\SorteioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'api'], function () {

    // Rotas de autenticação
    Route::prefix('auth')->group(function () {
        Route::post('signin', [AuthController::class, 'signin']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });


    Route::prefix('cartelas')->group(function () {
        Route::get('/', [CartelaController::class, 'index']);
        Route::post('/', [CartelaController::class, 'store']);
    });


});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['api', 'auth.admin'], 'prefix' => 'admin'], function () {

    Route::prefix('sorteios')->group(function () {
        Route::get('/', [SorteioController::class, 'index']);
        Route::post('/', [SorteioController::class, 'store']);
    });

});
