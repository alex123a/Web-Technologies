<?php

namespace App\Http\Controllers;

use App\Models\albums;
use App\Models\artists;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create() {
        $artists = artists::all();
        return view('albums.create', ["artists" => $artists]);
    }

    public function store() {
        $artist = artists::find(request("artist"));
        $album = new albums();
        $album->name = request("name");
        $album->year = request("release_date");
        $album->type = request("song_type");
        $album->description = request("description");
        $album->tracks = request("tracks");
        $album->artists()->associate($artist);

        $album->save();
        return redirect()->route("albums.index");
    }

    public function index() {
        return view("albums.index")->with("albums", albums::all());
    }
}
