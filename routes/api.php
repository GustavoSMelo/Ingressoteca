<?php

use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {

});

Route::prefix('/user')->group(function () {
    Route::post('/login', [TokenController::class, 'generateToken']);
    Route::post('', [UserController::class, 'store']);
});
