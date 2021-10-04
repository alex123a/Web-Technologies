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
        $album->tracks = request("track");
        $album->artists()->associate($artist);

        $album->save();
        return redirect()->route("albums.index");
    }

    public function index() {
        $albums = albums::all();
        $albums2 = array();
        foreach ($albums as $album) {
            $album["artist"] = artists::find($album["artists_id"])["name"];
            array_push($albums2, $album);
        }

        // It does the same as the view in create function. Here it just sent the albums instead of artists
        return view("albums.index")->with("albums", $albums2);
    }
}
