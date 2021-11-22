<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        if (request()->has("title"))
            $title = request("title");
        else
            $title = "Welcome!";

        return view("albums.index")
                ->with("albums", Album::all())
                ->with("title", $title);
    }

    public function create(){
        return view("albums.create");
    }

    public function store() {
        $album = new Album();
        $album->name = request("name");
        $album->tracks = request("tracks");
        $album->description = request("description");
        $album->save();
        return redirect()->route("albums.index");
    }

    public function show(Album $album) {
        return view("albums.show", ["album" => $album]);
    }
}
