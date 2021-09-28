<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function hello(){
        return 'Hello World, Album creator';
    }

    public function index(){
        $albums = ['1' => 'Album 1', '2' => 'Album 2'];
        return view('albums.index')->with('albums', $albums);
    }

    public function show($id){
        $albums = [$id => request('name')];
        return view('albums.index')->with('albums', $albums);
    }

    public function redirect1(){
        return redirect()->to('/test');
    }

    public function redirect2(){
        return redirect()->route('albums.show', ['id' => 42, 'name'=>'Album 1']);
    }

    public function redirect3(){
        return redirect()->route('albums.show', ['id' => 42, 'name'=>'Album 1'])->with('success','good job!');
    }

    public function directShow(Album $album){
        return var_dump($album);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(){
        return var_dump(request()->all());
    }

    public function destroy(Album $album){
        return 'Removed';
    }
}
