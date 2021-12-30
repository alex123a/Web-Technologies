<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ClickerController;

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

Route::get('/albums/create', [AlbumController::class, "create"])->name("albums.create");
Route::post('/albums/store', [AlbumController::class, "store"])->name("albums.store");
Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");

Route::get('/clicker/classic', [ClickerController::class, "classic"])
        ->name("clicker.classic");
Route::get('/clicker/ajax', [ClickerController::class, "ajax"]);
Route::post('/clicker/classic', [ClickerController::class, "classicSave"])
        ->name("clicker.classic.save");
Route::post('/clicker/ajax', [ClickerController::class, "ajaxSave"])
        ->name("clicker.ajax.save");