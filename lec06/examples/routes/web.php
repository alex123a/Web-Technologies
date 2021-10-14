<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
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

// Ajax examples
Route::get('/ajax/1', [AjaxController::class, 'example1'])
        ->name('ajax.1');
Route::get('/ajax/2', [AjaxController::class, 'example2'])
        ->name('ajax.2');
Route::get('/ajax/3', [AjaxController::class, 'example3'])
        ->name('ajax.3');
Route::get('/ajax/3/call', [AjaxController::class, 'example3Ajax'])
        ->name('ajax.3.call');
Route::get('/ajax/4', [AjaxController::class, 'example4'])
        ->name('ajax.4');
Route::post('/ajax/4/call', [AjaxController::class, 'example4Ajax'])
        ->name('ajax.4.call');

// Polling example
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');;
Route::get('/albums2', [AlbumController::class, 'index2']);
Route::get('/albums/notify', [AlbumController::class, 'notifyNew'])
        ->name('albums.notify');

// Event example
Route::get('/albums/create', [AlbumController::class, 'create']);
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');

// WebSocket example
Route::get('/albums3', [AlbumController::class, 'index3']);