<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/error', function () {
    throw new Exception("Testing errors");
});

Route::get('/error/catch', function () {
    try {
        throw new Exception("catched error");
    }
    catch (\Throwable $exception) {
        \Sentry\captureException($exception);
    }

    return "Error catched";
});

Route::get('/error/message', function () {
    \Sentry\captureMessage("Something went wrong");
    return "Message sent";
});

Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");
Route::post('/albums', [AlbumController::class, "store"])->name("albums.store");
Route::post('/user/albums', [AlbumController::class, "store"])->name("user.albums.store")->middleware('auth');
Route::get('/user/albums/create', [AlbumController::class, "create"])->name("user.albums.create")->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');