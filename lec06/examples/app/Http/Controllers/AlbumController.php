<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

use App\Events\AlbumCreated;

class AlbumController extends Controller
{
    public function index(){
        return view('albums.index')->with('albums', Album::all());
    }

    public function notifyNew() {
        $data = ['new' => false];

        $lastAlbum = Album::orderby('created_at', 'desc')->first();
        $sessionAlbum = session()->get('lastAlbum', $lastAlbum);
        if($sessionAlbum != $lastAlbum) {
            $data['new'] = true;
        }

        session()->put('lastAlbum', $lastAlbum);

        return $data;
    }

    public function index2(){
        return view('albums.index2')->with('albums', Album::all());
    }

    public function create() {
        return view('albums.create');
    }

    public function store() {

        $album = Album::create(request()->all());
        // event(new AlbumCreated($album));

        return redirect()->route("albums.index");
    }

    public function index3(){
        return view('albums.index3')->with('albums', Album::all());
    }
}
