<?php

use App\Http\Controllers\V1\CourtController;
use App\Http\Controllers\V1\ReservationController;
use App\Http\Controllers\V1\SurfaceController;
use App\Http\Controllers\V1\UserController;
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




Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\V1', 'middleware' => 'auth:sanctum'], function() {
    Route::apiResource('courts', CourtController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('surfaces', SurfaceController::class);
    Route::apiResource('users', UserController::class)->except(['store']);

    Route::get('/me', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\V1'], function() {
    Route::apiResource('users', UserController::class)->only(['store']);
});