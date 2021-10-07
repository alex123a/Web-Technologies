<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/albums/create', [AlbumController::class, "create"])->name("albums.create");

Route::post("/albums/store", [AlbumController::class, "store"])->name("albums.store");

Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");

Route::get("/artists", [ArtistController::class, "index"]) -> name("artists.index");

Route::get("/artists/create", [ArtistController::class, "create"]) -> name("artists.create");

Route::post("/artists/store", [ArtistController::class, "store"]) -> name("artists.store");

