<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;

Route::prefix('clubes')->group(function () {
    Route::get('/', [ClubeController::class, 'index']);
    Route::post('/', [ClubeController::class, 'store']);
});


