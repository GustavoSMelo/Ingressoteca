<?php

use App\Http\Controllers\AnnouncerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Models\ShowModel;
use Illuminate\Support\Facades\Route;
use Psy\Command\ShowCommand;

Route::prefix('/ticket')->group(function () {
    Route::post('', [TicketController::class, 'store']);
    Route::delete('/{id}', [TicketController::class, 'delete']);
});

Route::prefix('/purchase')->group(function () {
    Route::post('', [PurchaseController::class, 'store']);
    Route::delete('/{id}', [PurchaseController::class, 'delete']);
    Route::get('/{id}', [PurchaseController::class, 'show']);
});

Route::prefix('/user')->group(function () {
    Route::post('/login', [TokenController::class, 'generateToken']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('', [UserController::class, 'store']);
});

Route::prefix('/announcer')->group(function () {
    Route::post('', [AnnouncerController::class, 'store']);
    Route::post('/login', [AnnouncerController::class, 'login']);
    Route::get('/{id}', [AnnouncerController::class, 'show']);
});

Route::prefix('/show')->group(function () {
    Route::post('', [ShowController::class, 'store']);
    Route::get('', [ShowController::class, 'index']);
    Route::get('/{id}', [ShowController::class, 'show']);
    Route::delete('/{id}', [ShowController::class, 'delete']);
    Route::put('/{id}', [ShowController::class, 'store']);
    Route::get('/category/{category}', [ShowController::class, 'getPerCategory']);
    Route::get('/announcer/{id}', [ShowController::class, 'getByAnnouncerId']);
});
