
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TransportController;

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Пример страницы
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

// Аутентификация
Route::get('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/auth', [LoginController::class, 'authenticate'])
    ->name('auth');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Страница ошибки
Route::get('/error', function () {
    return response()->view('error', [
        'message' => session('message', 'Доступ запрещён.')
    ], 403);
})->name('error');

// Просмотр маршрутов
Route::get('/routes', [RouteController::class, 'index']);
Route::get('/routes/{id}', [RouteController::class, 'show']);

// Просмотр рейсов
Route::get('/trips', [TripController::class, 'index']);

// Защищённые маршруты
Route::middleware('auth')->group(function () {

    Route::get('/trips/create',
        [TripController::class, 'create']);

    Route::post('/trips',
        [TripController::class, 'store']);

    Route::get('/trips/{id}/edit',
        [TripController::class, 'edit']);

    Route::put('/trips/{id}',
        [TripController::class, 'update']);

    Route::delete('/trips/{id}',
        [TripController::class, 'destroy']);

});

// Просмотр конкретного рейса
Route::get('/trips/{id}', [TripController::class, 'show']);

// Просмотр транспорта
Route::get('/transports/{id}', [TransportController::class, 'show']);
