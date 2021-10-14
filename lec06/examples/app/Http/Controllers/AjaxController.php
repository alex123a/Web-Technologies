<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function example1(){
        return view('ajax1');
    }

    public function example2(){
        return view('ajax2');
    }

    public function example3(){
        return view('ajax3');
    }

    public function example3Ajax(){
        if (request("error"))
            abort(400);

        return ["albums" => [
                    ["name" => "Album using PHP", "id" => 1],
                    ["name" => "Second Album using PHP", "id" => 2],
                    ["name" => request("msg"), "id" => 3]
                ]];
    }

    public function example4(){
        return view('ajax4');
    }

    public function example4Ajax(){
        if (request("error"))
            abort(400);

        return ["albums" => [
                    ["name" => "Album with POST", "id" => 1],
                    ["name" => request("msg"), "id" => 2]
                ]];
    }
}
