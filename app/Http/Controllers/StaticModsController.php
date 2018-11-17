<?php

namespace App\Http\Controllers;

use App\StaticMod;
use Illuminate\Http\Request;

class StaticModsController extends Controller{

    public function index(){
        $mods = StaticMod::where('active', '1')->orderBy('sort', 'desc')->get();
        return view('mods.index', [
            'mods' => $mods
        ]);
    }

}
