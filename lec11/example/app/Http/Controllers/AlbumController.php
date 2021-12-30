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
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("Index");
        return view("albums.index")
                    ->with("albums", Album::all())
                    ->with("count", Album::count());
        // return view("albums.index")
        //             ->with("albums", Album::with('artist')->get())
        //             ->with("count", Album::count());
    }

    public function indexCache() {
        $albums = cache()->remember('albums', 120, function() {
            // return Album::all();
            return Album::with('artist')->get();
        });
        return view("albums.index")->with("albums", $albums);
    }
}
