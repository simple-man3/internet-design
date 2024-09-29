<?php

use App\Http\ApiV1\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/ticket')->group(function () {
        Route::get('/shows', [TicketsController::class, 'shows']);
        Route::get('/shows/{showId}/events', [TicketsController::class, 'events']);
        Route::get('/events/{eventId}/places', [TicketsController::class, 'places']);
        Route::post('/events/{eventId}/reserve', [TicketsController::class, 'reserve']);
    });
});
