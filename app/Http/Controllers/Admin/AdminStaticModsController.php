<?php

namespace App\Http\Controllers\Admin;

use App\Dlc;
use App\StaticMod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Transliterate;

class AdminStaticModsController extends Controller{

    public function index(){
        $mods = StaticMod::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.static_mods.index', [
            'mods' => $mods
        ]);
    }

    public function add(Request $request){
        $mod = new StaticMod();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'title' => 'required|string',
                'tested_ver' => 'required|string',
                'game' => 'required|string',
                'file' => 'required|file|mimes:scs,zip',
            ]);
            $file_name = Transliterate::make(trim($request->input('title')), ['type' => 'filename', 'lowercase' => true]);
            $last_mod = StaticMod::orderBy('sort', SORT_DESC)->first();
            $mod->fill([
                'game' => $request->input('game', 'ets2'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'tested_ver' => $request->input('tested_ver'),
                'dlc' => $request->input('dlc') ? implode(',', $request->input('dlc')) : null,
                'active' => $request->input('active') == 'on',
                'image' => $mod->saveImage(),
                'sort' => ($last_mod ? intval($last_mod->sort) : 0)+1
            ]);
            if($mod->saveFile($file_name) && $mod->save()) return redirect()->route('admin_static_mods')->with(['success' => 'Мод успішно додано!']);
        }

        return view('admin.static_mods.edit', [
            'mod' => $mod,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

}