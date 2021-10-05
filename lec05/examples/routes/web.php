<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
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


// custom controller
Route::get('/albums', [AlbumsController::class, 'index'])->name('albums.index');
Route::get('/albums2', [AlbumsController::class, 'index2'])->middleware('auth');

Route::get('/albums/create', [AlbumsController::class, 'create'])
        ->name('albums.create');
Route::post('/albums/store', [AlbumsController::class, 'store'])
        ->name('albums.store');
Route::delete('/albums/destroy', [AlbumsController::class, 'destroy'])
        ->name('albums.destroy');


Route::get('/albums/showAuth1/{album}', [AlbumsController::class, 'showAuth1'])
        ->name('albums.showAuth1');
Route::get('/albums/showAuthPolicy/{album}', [AlbumsController::class, 'showAuthPolicy'])
        ->name('albums.showAuthPolicy');
        // ->middleware('can:show,album');
Route::get('/albums/showAdmin/{album}', [AlbumsController::class, 'show'])
        ->name('albums.showAdmin')
        ->middleware('admin');

Route::get('/albums/{album}', [AlbumsController::class, 'show'])
        ->name('albums.show');
        

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
