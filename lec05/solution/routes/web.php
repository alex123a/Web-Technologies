<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

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

Route::get('/albums/create', [AlbumController::class, "create"])->name("albums.create")->middleware('auth');
Route::post('/albums/store', [AlbumController::class, "store"])->name("albums.store")->middleware('auth');
Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");


require __DIR__.'/auth.php';
