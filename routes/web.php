<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TransportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/routes', [RouteController::class, 'index']);
Route::get('/routes/{id}', [RouteController::class, 'show']);

Route::get('/trips', [TripController::class, 'index']);

Route::get('/trips/create', [TripController::class, 'create']);
Route::post('/trips', [TripController::class, 'store']);

Route::get('/trips/{id}/edit', [TripController::class, 'edit']);
Route::put('/trips/{id}', [TripController::class, 'update']);

Route::delete('/trips/{id}', [TripController::class, 'destroy']);

Route::get('/trips/{id}', [TripController::class, 'show']);

Route::get('/transports/{id}', [TransportController::class, 'show']);
