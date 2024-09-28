<?php

use App\Http\ApiV1\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/ticket')->group(function () {
        Route::get('/shows', [TicketsController::class, 'shows']);
        Route::get('/shows/{id}/events', [TicketsController::class, 'events']);
        Route::get('/events/{id}/places', [TicketsController::class, 'places']);
        Route::post('/events/{id}/reserve', [TicketsController::class, 'reserve']);
    });
});
