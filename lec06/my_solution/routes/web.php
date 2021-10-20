<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/albums/create', [AlbumController::class, "create"])->middleware(['auth'])->name("albums.create");

Route::post("/albums/store", [AlbumController::class, "store"])->name("albums.store");

Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");

Route::get("/artists", [ArtistController::class, "index"])->name("artists.index");

Route::get("/artists/create", [ArtistController::class, "create"])->middleware(['auth'])->name("artists.create");

Route::post("/artists/store", [ArtistController::class, "store"])->name("artists.store");

Route::get("/albums/getAlbums", [AlbumController::class, "getAlbums"])->name("albums.getAlbums");

Route::post("/albums/deleteAlbum/{id}", [AlbumController::class, "delete"])->name("albums.deleteAlbum");

// Route::get("/login", [UserController::class, "login"])->name("user.login");
