<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;

use Illuminate\Support\Facades\DB;

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


Route::get('/albums', [AlbumController::class, "index"])->name("albums.index");
Route::post('/albums', [AlbumController::class, "store"])
                    ->name("albums.store");
Route::get('/albums/create', [AlbumController::class, "create"])
                    ->name("albums.create");
Route::get('/albums/{album}', [AlbumController::class, "show"])->name("albums.show");

Route::get('/injection/code/exec', function(){
    //host=google.com;whoami
    exec("ping -c 4 " . request('host'), $output);
    return $output;
});

Route::get('/injection/sql/where', function(){
    //id=2 OR 1=1
    $id = request("id");
    return DB::table("albums")
        ->select("name")
        ->whereRaw('id =' . $id)->get();
});

Route::get('/injection/sql/select', function(){
    //id=2 OR 1=1
    $id = request("id");
    return DB::select("SELECT name FROM albums WHERE id=".$id.";");
});