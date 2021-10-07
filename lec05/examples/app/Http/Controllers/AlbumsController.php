<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Rules\AlbumNameRule;

class AlbumsController extends Controller
{

    public function index(){
        $countVisit = session()->get('counter', 0);
        $countVisit++;
        session()->put('counter', $countVisit);
        return view('albums.index')->with('albums', Album::all())->with('countVisit', $countVisit);
    }

    public function index2(){
        return view('albums.index2')->with('user', auth()->user());
    }

    public function show(Album $album){
        return view('albums.index')->with('albums', [$album])->with('countVisit', 1);
    }


    public function create(){
        return view('albums.create');
    }

    public function store(){
        request()->validate([
            'name' => [new AlbumNameRule],
        ]);

        $album = new Album();
        $album->name = request("name");
        $album->save();

        return redirect()->route("albums.index");
    }

    public function destroy(Album $album){
        session()->forget('counter');
        return 'Removed';
    }

    public function showAuth1(Album $album){
        if(Gate::denies('create-album', $album)) {
            abort(403);
        }
        // Gate::authorize('show-album', $album);
        $countVisit = session()->get('counter', 0);
        $countVisit++;
        return view('albums.index')->with('albums', [$album])->with('countVisit', $countVisit);
    }

    public function showAuthPolicy(Album $album){
        // if (request()->user()->cannot('show', $album)) {
        //     abort(403);
        // }
        Gate::authorize('show', $album);
        $countVisit = session()->get('counter', 0);
        $countVisit++;
        return view('albums.index')->with('albums', [$album])->with('countVisit', $countVisit);
    }
}
