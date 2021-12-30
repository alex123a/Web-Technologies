<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artists;

class ArtistController extends Controller
{
    public function show() {
        $artists = artists::all();

        return view('artists.index', ["artists" => $artists]);
    }

    public function store() {
        $artist = new artists();
        $artist->name = request('name');
        $artist->save();

        return redirect()->route('albums.create');
    }

    public function create() {
        return view("artists.create");
    }
}
