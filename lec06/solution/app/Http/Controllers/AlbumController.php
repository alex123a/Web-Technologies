<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function create() {
        return view("albums.create")->with("artists", Artist::all());
    }

    public function store() {
        $artist = Artist::find(request("artist"));
        $album = new Album();
        $album->name = request("name");
        $album->year = request("year");
        $album->type = request("type");
        $album->tracks = request("tracks");
        $album->description = request("description");
        $album->artist()->associate($artist);

        $album->save();
        return redirect()->route("albums.index");
    }

    public function index() {
        return view("albums.index")->with("albums", Album::all());
    }

    public function indexGet(){
        return view('albums.indexGet')->with('albums', Album::all());
    }

    public function apiAlbums(){
        return Album::all();
    }

    public function destroy(Album $album){
        return $album->delete();
    }

    public function polling(){
        $albums = Album::all();
        return view("albums.polling")->with("albums", $albums);
    }

    public function pollingNotify(){
        $data = ['new' => false];
        $lastAlbum = Album::orderby('created_at', 'desc')->first();
        $sessionAlbum = session()->get('lastAlbum', $lastAlbum);
        if($sessionAlbum != $lastAlbum) {
            $data['new'] = true;
        }

        session()->put('lastAlbum', $lastAlbum);

        return $data;
    }

    public function websocket() {
        return view("albums.websocket")->with("albums", Album::all());
    }

}
