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


// Parameters
Route::get('/users/{id}', function ($id) {
    echo $id;
    return view('welcome');
})->name('users.show');

// text
Route::get('/text', function () {
    return 'Hello, World!';
});

// test view
Route::get('/test', function () {
    return view('test');
});

// view with data
Route::get('/data', function () {
    $data = ['data1' => 'Data 1', 'data2' => 'Data 2'];
    return view('data', $data);
});

// custom controller
Route::get('/albums/hello', [AlbumsController::class, 'hello']);
Route::get('/albums', [AlbumsController::class, 'index']);
Route::get('/albums/redirect1', [AlbumsController::class, 'redirect1']);
Route::get('/albums/redirect2', [AlbumsController::class, 'redirect2']);
Route::get('/albums/redirect3', [AlbumsController::class, 'redirect3']);
Route::get('/albums/direct/{album}', [AlbumsController::class, 'directShow']);

Route::get('/albums/create', [AlbumsController::class, 'create'])
        ->name('albums.create');
Route::post('/albums/store', [AlbumsController::class, 'store'])
        ->name('albums.store');
Route::delete('/albums/destroy', [AlbumsController::class, 'destroy'])
        ->name('albums.destroy');


Route::get('/albums/{id}', [AlbumsController::class, 'show'])
        ->name('albums.show');
