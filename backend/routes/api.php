<?php

use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(VideoController::class)
    ->name('api.videos.')
    ->prefix('videos')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
