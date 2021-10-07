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

        request()->validate(["name" => 'required|max:100|nullable', "release_date" => 'required|numeric|between:1800,2021', "artist" => 'exists:artists,id']);
        $album->name = request("name");
        $album->year = request("release_date");
        $album->type = request("song_type");
        $album->description = request("description");
        $album->tracks = request("track");
        $album->artists()->associate($artist);
        $album->save();
        $numberOfAlbums = session()->get('albumCounter', 0);
        $numberOfAlbums++;
        session()->put('albumCounter', $numberOfAlbums);
        return redirect()->route("albums.index");
    }

    public function index() {
        $numberOfAlbums = session()->get('albumCounter', 0);
        $albums = albums::all();
        $albums2 = array();
        foreach ($albums as $album) {
            $album["artist"] = artists::find($album["artists_id"])["name"];
            array_push($albums2, $album);
        }

        // It does the same as the view in create function. Here it just sent the albums instead of artists
        return view("albums.index")->with("albums", $albums2)->with('numberOfAlbums', $numberOfAlbums);
    }
}
