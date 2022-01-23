<?php

use App\Http\Controllers\AnnouncerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('/ticket')->group(function () {
        Route::post('', [TicketController::class, 'store']);
        Route::delete('/{id}', [TicketController::class, 'delete']);
    });

    Route::prefix('/purchase')->group(function () {
        Route::post('', [PurchaseController::class, 'store']);
        Route::delete('/{id}', [PurchaseController::class, 'delete']);
    });
});

Route::prefix('/user')->group(function () {
    Route::post('/login', [TokenController::class, 'generateToken']);
    Route::post('', [UserController::class, 'store']);
});

Route::prefix('/announcer')->group(function () {
    Route::post('', [AnnouncerController::class, 'store']);
});

Route::prefix('/show')->group(function () {
    Route::post('', [ShowController::class, 'store']);
    Route::get('', [ShowController::class, 'index']);
    Route::get('/{id}', [ShowController::class, 'show']);
    Route::delete('/{id}', [ShowController::class, 'delete']);
    Route::put('/{id}', [ShowController::class, 'store']);
});
