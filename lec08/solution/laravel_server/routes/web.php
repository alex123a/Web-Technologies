<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
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


Route::post('/albums', [AlbumController::class, "store"])->name("albums.store");
Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");
Route::get('/albums/create', [AlbumController::class, "create"])->name("albums.create");
Route::get('/albums/{album}', [AlbumController::class, "show"])->name("albums.show");

Route::get('/register', [AuthController::class, "register"])
        ->name("auth.register")
        ->middleware("guest");
Route::post('/register', [AuthController::class, "doRegister"])
        ->name("auth.doRegister")
        ->middleware("guest");
Route::get('/login', [AuthController::class, "login"])
        ->name("auth.login")
        ->middleware("guest");
Route::post('/login', [AuthController::class, "doLogin"])
        ->name("auth.doLogin")
        ->middleware("guest");
Route::post('/logout', [AuthController::class, "logout"])
        ->name("auth.logout")
        ->middleware("auth");