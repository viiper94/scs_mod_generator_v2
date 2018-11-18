<?php

namespace App\Http\Controllers;

use App\Dlc;
use App\StaticMod;
use Illuminate\Http\Request;

class StaticModsController extends Controller{

    public function index(Request $request, $game = 'ets2'){
        $mods = StaticMod::select(['*']);
        if($request->input('q')) $mods->orWhere('title_ru', 'like', '%'.$request->input('q').'%')
            ->orWhere('title_ru', 'like', '%'.$request->input('q').'%')
            ->orWhere('description_ru', 'like', '%'.$request->input('q').'%')
            ->orWhere('description_en', 'like', '%'.$request->input('q').'%');
        return view('mods.index', [
            'mods' => $mods->where(['active' => '1', 'game' => $game])->orderBy('sort', 'desc')->paginate(12),
            'dlc' => Dlc::all()->keyBy('id')->toArray()
        ]);
    }

}