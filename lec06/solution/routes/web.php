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

Route::get('/albums/create', [AlbumController::class, "create"])->name("albums.create");
Route::post('/albums/store', [AlbumController::class, "store"])->name("albums.store");
Route::get('/albumsGet' , [AlbumController::class, "indexGet"])->name("albums.indexGet");
Route::get('/api/albums' , [AlbumController::class, "apiAlbums"])->name("albums.apiAlbums");
Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");
Route::post('/albums/destroy/{album}', [AlbumController::class, "destroy"])->name("albums.destroy");
Route::get('/albums/polling', [AlbumController::class, "polling"])->name("albums.polling");
Route::get('/albums/polling/notify', [AlbumController::class, "pollingNotify"])->name("albums.polling.notify");
Route::get('/albums/websocket', [AlbumController::class, "websocket"])->name("albums.websocket");