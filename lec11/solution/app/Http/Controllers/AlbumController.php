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
        if (session()->has("ab")) {
            $view = session()->get("ab");
        }
        else {
            $view = rand(0,100) >= 50 ? "albums.indexA" : "albums.indexB";
            session()->put("ab", $view);
        }
        return view($view)
                    ->with("albums", Album::with('artist')->get());
    }
}
