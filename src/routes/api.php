<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\ConsumoController;

Route::prefix('clubes')->group(function () {
    Route::get('/', [ClubeController::class, 'index']);
    Route::post('/', [ClubeController::class, 'store']);
});

Route::prefix('consumo')->group(function () {
    Route::post('/', [ConsumoController::class, 'consumir']);
});

