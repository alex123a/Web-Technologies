<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        return view("albums.index")->with("albums", Album::all());
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

}
