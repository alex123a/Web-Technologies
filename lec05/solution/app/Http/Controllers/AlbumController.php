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

        request()->validate([
            'name' => ['required', 'string'],
            'year' => ['required', 'numeric'],
            'artist' => ['required', 'exists:artists,id']
        ]);

        $artist = Artist::find(request("artist"));
        $album = new Album();
        $album->name = request("name");
        $album->year = request("year");
        $album->type = request("type");
        $album->tracks = request("tracks");
        $album->description = request("description");
        $album->artist()->associate($artist);

        session()->increment('counter');
        $album->save();
        return redirect()->route("albums.index")
                        ->with("success", "Album $album->name created successfully");
    }

    public function index() {
        return view("albums.index")->with("albums", Album::all());
    }
}
