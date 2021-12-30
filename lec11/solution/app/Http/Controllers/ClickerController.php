<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;

class ClickerController extends Controller
{

    public function classic() {

        return view("clicker.view")
                ->with("count", session()->get("count", 0))
                ->with("classic", true);
    }

    public function classicSave() {
        session()->increment('count');
        return redirect()->route("clicker.classic");
    }

    public function ajax() {
        return view("clicker.view")
                ->with("count", session()->get("count", 0))
                ->with("classic", false);   
    }

    public function ajaxSave() {
        session()->increment('count');
        return ["count" => session()->get("count")];
    }
}
